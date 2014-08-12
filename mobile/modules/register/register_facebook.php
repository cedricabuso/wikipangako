<?php
function RegisterFacebook($facebook_id, $name){
    global $database;
    if($database==null)
        Connect();
    $name = rawurldecode($name);
    $result = $database->query("SELECT account_id, facebook_id FROM ACCOUNT WHERE facebook_id=\"{$facebook_id}\"");
    if($result->num_rows==0){
        $database->query("INSERT INTO ACCOUNT (username, password, email, facebook_id, twitter_id, enforcer_points, name, privacy, searchable) VALUES(null, null, null, ". $facebook_id .", null, 0, '" . $name .", 0, 1')");
        $result = $database->query("SELECT account_id FROM ACCOUNT WHERE facebook_id=\"{$facebook_id}\"");
        $row = $result->fetch_assoc();
        $database->query("INSERT INTO ROLE (role_type, account_id_fk, politician_id_fk) VALUES (1, ". $row['account_id'] .", null)");
    }

    if(empty($row))
        $row = $result->fetch_assoc();

    return $row['account_id'];
}
?>