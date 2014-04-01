<?php
require_once 'global.php';
require_once 'modules/register/register_facebook.php';
require_once 'modules/politician/random_politician.php';
require_once 'modules/network/retrieve_contact_count.php';
require_once 'modules/wikip/retrieve_wikip_count.php';

function LeftSideBar(){
    global $facebook;

    if($facebook->getUser()){
        $user_profile = $facebook->api('/me','GET');
        $_SESSION['account_id'] = RegisterFacebook($user_profile['id'], $user_profile['name']);
        $_SESSION['facebook_user'] = $user_profile;
        //header('Location: http://wikip.ap01.aws.af.cm/');
        //exit;
    }

    $random = RandomPolitician();

    echo '
        <div class="left-bar pull-left">
            <div class="profile-preview">
                <img class="profpic pull-left" src="http://graph.facebook.com/'. $_SESSION['facebook_user']['id'] .'/picture?type=square"/>
                <a href="?main=home&inner=user_profile&user_id=' . $_SESSION['account_id'] . '"><span class="firstname">' . $user_profile['first_name'] . '</span>
                <span class="lastname">' . $user_profile['last_name'] . '</span></a>
                <table class="stats">
                    <tr>
                        <td class="stats-left">
                            <a href="?main=home&inner=user_profile&user_id=' .$_SESSION['account_id']. '">
                                <button class="btn btn-warning"><b id="wikip-count" class="numbers">'.  RetrieveWikiPCount($_SESSION['account_id']) .' </b> <i class="icon-large icon-search"></i></button>
                            </a>
                        </td>
                        <td></td>
                        <td class="stats-right">
                            <a href="?main=home&inner=network">
                                <button class="btn btn-warning"><b id="network-count" class="numbers">' .  RetrieveContactCount($_SESSION['account_id']) .' </b> <i class="icon-large icon-user"></i></button>
                            </a>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="nav-links">
                <ul class="nav nav-tabs nav-stacked">  
                    <li><a href="?main=home"><i class="icon-home icon-large"></i> Home <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=watchlist"><i class="icon-eye-open icon-large"></i> Watchlist <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=network"><i class="icon-user icon-large"></i> Network <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=user_wikip&user_id=' .$_SESSION['account_id']. '"><i class="icon-flag icon-large"></i> WikiP <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=politicians"><i class="icon-briefcase icon-large"></i> Politicians <span class="arrow pull-right">></span></a></li>
                    <li><a href="?logout=true"><i class="icon-off icon-large"></i> Logout <span class="arrow pull-right">></span></a></li>
                </ul>  
            </div>
            <div id="toknow">
                <h4>Get to know</h4>
                <img class="profpic pull-left" src="img/' . $random['politician_id'].'.jpg"/><br>
                <a href="?main=home&inner=politician-profile&id=' . $random['politician_id'] . '"<span id="know-first" class="firstname">' . $random['name'] . '</span></a><br>
                <span class="firstname">'.$random['position'].'</span>
            </div>
        </div>
    ';
}
?>