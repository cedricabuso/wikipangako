<?php
require_once 'global.php';
require_once 'modules/politician/random_politician.php';
require_once 'modules/promise/pdaf_watch.php';

function LeftSideBar_guest(){
    $data = RandomPolitician();
    $data2 = PdafWatch();
    
    echo '
        <div class="left-bar pull-left">
            <div class="profile-preview">
                <img class="profpic pull-left" src="img/default_profile.jpg" />
                <span class="firstname">Guest</span>
                <table class="stats">
                    <tr>
                        <td class="stats-left btn"><b class="numbers">N/A</b> <i class="icon-large icon-search"></i></td>
                        <td></td>
                        <td class="stats-right btn"><b class="numbers">N/A</b> <i class="icon-large icon-user"></i> </td>
                    </tr>
                </table>
            </div>
            <div class="nav-links">
                <ul class="nav nav-tabs nav-stacked">
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
        </div>';
}
?>