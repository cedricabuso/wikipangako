<?php
function FacebookLogin(){
    //Facebook initialization

    global $facebook;

    $user = $facebook->getUser();
    if ($user) {
        try {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $facebook->api('/me');
        } catch (FacebookApiException $e) {
            error_log($e);
            $user = null;
        }
    }


    if(isset($_GET['action']) && $_GET['action'] === 'logout'){
      $facebook->destroySession();
      header('Location: index.php');
      die();
    }
    $loginUrl = $facebook->getLoginUrl(array('scope' => 'publish_stream, email', 'redirect_uri' => HOSTNAME.'setsession.php'));
    echo '<a href="' . $loginUrl . '"><img class="facebook-img" src="img/facebook.png" /></a>';
}
?>