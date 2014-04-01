<?php
require_once 'global.php';
require_once 'database.php';
require_once 'modules/register/register_facebook.php';

global $facebook;

if($facebook->getUser()){
    $user_profile = $facebook->api('/me','GET');
    $_SESSION['account_id'] = RegisterFacebook($user_profile['id'], $user_profile['name']);
    $_SESSION['facebook_user'] = $user_profile;

    if(isset($_SESSION['moderator']))
        unset($_SESSION['moderator']);

    if(isset($_SESSION['politician']))
        unset($_SESSION['politician']);

    $_SESSION['normal_user'] = true;
    header('Location: '.HOSTNAME);
}

?>