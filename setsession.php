<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
 
require_once 'global.php';
require_once 'database.php';
require_once 'modules/register/register_facebook.php';
require_once 'modules/login/facebook_login.php';

global $facebook;

$access_token = $facebook->getAccessToken();
$facebook->setAccessToken($access_token);
//echo $access_token;

//$user_profile = $facebook->api('/me','GET');
try{
	$user_profile = $facebook->api('me?fields=id,name,first_name,last_name');

	$_SESSION['account_id'] = RegisterFacebook($user_profile['id'], $user_profile['name']);

	$_SESSION['facebook_user'] = $user_profile;

	if(isset($_SESSION['moderator']))
		unset($_SESSION['moderator']);

	if(isset($_SESSION['politician']))
		unset($_SESSION['politician']);

	$_SESSION['normal_user'] = true;
	header('Location: '.HOSTNAME);
	die();
}
catch(Exception $e){
	echo '<html><head><title>Redirecting...</title></head><body>';
	echo 'User authenticated. Redirecting... ';
	$loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_stream, email', 'redirect_uri' => HOSTNAME.'setsession.php'));
	echo '<a id="login" href="' . $loginUrl . '">Click here</a> if you are not redirected within 5 seconds.';
	echo '<script type="text/javascript">document.getElementById("login").click()</script>';
	echo '</body></html>';
	//FacebookLogin();
}
?>