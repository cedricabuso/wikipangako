<?php
require_once 'global.php';
require_once 'modules/register/register_facebook.php';

function LeftSideBar(){
    global $facebook;

    if($facebook->getUser()){
        $user_profile = $facebook->api('/me','GET');
        $_SESSION['account_id'] = RegisterFacebook($user_profile['id'], $user_profile['name']);
        $_SESSION['facebook_user'] = $user_profile;
        //header('Location: http://wikip.ap01.aws.af.cm/');
        //exit;
    }

    echo '
        <div class="left-bar pull-left">
            <div class="profile-preview">
                <img class="profpic pull-left" src="http://graph.facebook.com/'. $_SESSION['facebook_user']['id'] .'/picture?type=square"/>
                <a href="?main=home&inner=user_profile&user_id=' . $_SESSION['account_id'] . '"><span class="firstname">' . $user_profile['first_name'] . '</span>
                <span class="lastname">' . $user_profile['last_name'] . '</span></a>
            </div>
            <div class="nav-links">
                <ul class="nav nav-tabs nav-stacked">  
                    <li><a href="?main=home&inner=approve-wikips"><i class="icon-inbox icon-large"></i> Approve WikiPs <span class="arrow pull-right">></span></a></li>
                </ul>  
            </div>
        </div>
    ';
}
?>