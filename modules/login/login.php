<?php
function Login($facebook_id){
    global $database;
    if($database==null)
        Connect();

    if(!empty($facebook_id)){
        $result = $database->query("SELECT * FROM ACCOUNT WHERE facebook_id=\"" . $facebook_id);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            return $row['account_id'];
        }
        else return 'False';
    }
}
?>