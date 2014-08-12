<?php
function Login($username, $password){
    global $database;
    if($database==null)
        Connect();

    if(!empty($username) && !empty($password)){
        $result = $database->query("SELECT * FROM ACCOUNT WHERE username=\"" . $username . "\" AND password=\"" . md5($password) . "\"");
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['account_id'] = $row['account_id'];
            echo 'true';
        }
        else echo 'Invalid username/password';
    }
}
?>