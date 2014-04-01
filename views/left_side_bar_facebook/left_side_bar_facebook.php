<?php
require_once 'global.php';
require_once 'modules/register/register_facebook.php';
require_once 'modules/politician/random_politician.php';
require_once 'modules/network/retrieve_contact_count.php';
require_once 'modules/wikip/retrieve_wikip_count.php';
require_once 'modules/enforcer/get_points.php';
require_once 'modules/promise/pdaf_watch.php';

function LeftSideBar_Facebook(){
    $data = RandomPolitician();
    $data2 = PdafWatch();
    $user_profile = $_SESSION['facebook_user'];
    echo '
        <div class="left-bar pull-left">
            <div class="profile-preview">
                <img class="profpic pull-left" src="http://graph.facebook.com/'. $_SESSION['facebook_user']['id'] .'/picture?width=200&height=200"/>
                <a href="?main=home&inner=user_wikip&user_id=' . $_SESSION['account_id'] . '"><span class="firstname">' . $user_profile['first_name'] . '</span>
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
                    <li><a href="?main=home&inner=tambayan"><img class="wikip-icons" src="img/wpcons/tambayanicon.png"/> Tambayan (Home) <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home"><img class="wikip-icons" src="img/wpcons/newsfeed2.png"/> Newsfeed <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=watchlist"><img class="wikip-icons" src="img/wpcons/watchlisticon.png"/> Watchlist <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=network"><img class="wikip-icons" src="img/wpcons/networkicon.png"/> Network <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=user_wikip&user_id=' .$_SESSION['account_id']. '"><img class="wikip-icons" src="img/wpcons/upload_wikip.png"/> Upload <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=politicians"><img class="wikip-icons" src="img/wpcons/politicianicon.png"/> Politicians <span class="arrow pull-right">></span></a></li>
                </ul>  
            </div>
            <div id="toknow">
                <h4>Get to know</h4>';
    if($data){
        foreach ($data as $key) {
            echo '
                <div>
                    <img class="profpic pull-left" src="img/politicians/' . $key['politician_id'].'.jpg"/><br>
                    <a title=\'' . $key['name'] . '\' href="?main=home&inner=politician-profile&id=' . $key['politician_id'] . '"<span class="firstname know-first">' . $key['name'] . '</span></a><br>
                    <span class="firstname know-first">'.$key['position'].'</span><br>';
            if($key['city'] && $key['province'])    
                echo'<span class="firstname know-first">'.$key['city'].', '.$key['province'].'</span>';
            echo'<br><br><br>
                </div>';
        }
    }
    echo'   </div>
            <div id="towatch">
                <h4>#PangakoWatch</h4>';
    if($data2){
        foreach ($data2 as $key) {
            echo '
                <div>
                    <img class="profpic pull-left" src="img/politicians/' . $key['politician_id_fk'].'.jpg"/><br>
                    <a title=\'' . $key['politician_name'] . '\' href="?main=home&inner=politician-profile&id=' . $key['politician_id_fk'] . '"<span class="firstname know-first">' . $key['politician_name'] . '</span></a><br>
                    <span class="firstname know-first">' . $key['name'] . '</span><br>
                    <span class="firstname details">'.$key['details'].'</span><br>';
            echo'<br><br>
                </div>';
        }
    }
    echo'
            </div>
            <div style="margin-top: -15px;">
                <h4 style="margin-left: 10px;">Donate: Help us keep this site online!</h4>
                <a class="donate-sidebar" href="?main=donate" title="Click here to donate!">
                    <img class="pull-left" style="width: 125px;margin-left: -20px;" src="img/wpcons/donateicon.png">
                    Wikipangako is managed by Wikipangako Inc., a non-profit organization registered under the Securities and Exchange Commission, Philippines. 
                    Wikipangako is an initiative of young Filipinos who believe ...
                </a>
            </div>
        </div>
    ';
}
?>