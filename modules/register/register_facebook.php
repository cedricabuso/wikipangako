<?php
function RegisterFacebook($facebook_id, $name){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT account_id, facebook_id FROM ACCOUNT WHERE facebook_id=\"{$facebook_id}\"");
    if($result->num_rows==0){
        $database->query("INSERT INTO ACCOUNT (username, password, email, facebook_id, twitter_id, enforcer_points, name) VALUES(null, null, null, ". $facebook_id .", null, 0, '" . $name ."')");
        $result = $database->query("SELECT account_id FROM ACCOUNT WHERE facebook_id=\"{$facebook_id}\"");
        $row = $result->fetch_assoc();
        $database->query("INSERT INTO ROLE (role_type, account_id_fk, politician_id_fk) VALUES (1, ". $row['account_id'] .", null)");
        $database->query("INSERT INTO IS_CONTACT (account_id1_fk, account_id2_fk) VALUES(".$row['account_id'].", 41)");
    }

    if(empty($row))
        $row = $result->fetch_assoc();

    return $row['account_id'];
}
?>