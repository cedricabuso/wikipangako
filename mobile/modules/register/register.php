<?php
function Register($username, $password, $email){
    global $database;
    if($database==null)
        Connect();

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        return 'Invalid e-mail';

    $allowed = array(".", "_");
    if(ctype_alnum(str_replace($allowed, '', $username))){}
    else return 'Username must only contain alphanumeric characters, \'.\' & \'_\' and must not have \'.\' and \'_\' as the starting or ending character.';

    if(ctype_alnum(str_replace($allowed, '', $password))){}
    else return 'Password must only contain alphanumeric characters, \'.\' & \'_\' and must not have \'.\' and \'_\' as the starting or ending character.';

    $result = $database->query("SELECT username FROM ACCOUNT WHERE username=\"{$username}\"");
    if($result->num_rows==0){
        $database->query("INSERT INTO ACCOUNT (username, password, email, facebook_id, twitter_id, enforcer_points) VALUES(\"" . $username . "\", \"" . md5($password) ."\", \"" . $email . "\", null, null, 0)");
        return true;
    }
    else return 'Username already exists.';
}
?>