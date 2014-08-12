<?php
require_once 'global.php';
require_once 'modules/network/retrieve_contacts.php';
require_once 'modules/network/retrieve_my_contacts.php';
require_once 'modules/network/retrieve_all_contacts.php';
require_once 'modules/settings/account_state.php';

function Network(){
    echo '
        <input id="account_id" type="hidden" value="'.$_SESSION['account_id'].'"/>
        <div id="network-container" class="newsfeed">
            <h2 style="margin-top: -50px;"><img style="padding-top: 35px;padding-bottom: 30px; padding-right: 20px;width: 75px;" src="img/wpcons/networkicon.png"/>Network</h2>
            <hr style="margin-top: -45px;">
            <div id="search-network" class="input-append">
                <form name="search-network" method="post" action="">
                    <input name="network" type="text" placeholder="Search Network ..." required="required" />
                    <button name="search" class="btn add-on"><i class="icon-search"></i></button>
                    <br>
                    <input type="radio" id="network" name="filter" value="network" checked="checked"><label class="net-label" for="network">In Your Network</label>
                    <input type="radio" id="wikipangako" name="filter" value="wikipangako"><label class="net-label" for="wikipangako">In WikiPangako</label>
                </form>
            </div>
            <br>
            <div class="results">';

    if(isset($_POST['search'])){
        $filter = $_POST['filter'];
        if($_POST['filter']=='network')
            $data = RetrieveMyContacts($_POST['network'], $_SESSION['account_id']);
        else
            $data = RetrieveContacts($_POST['network'], $_SESSION['account_id']);

        if($data){
            foreach ($data as $key) {
                echo '  <div id="'.$key['account_id'].'-container" class="watchlist-result">
                            <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">
                            <a href="?main=home&inner=user_profile&user_id='.$key['account_id'].'">
                                <span class="fullname know-first">'.$key['name'].'</span></a>
                        ';
                if($filter=='wikipangako'){
                    $account_state = AccountState($key['account_id']);
                    if($account_state[0]['privacy']=='1')
                        echo    '<br>
                                <a id="'.$key['account_id'].'" href="javascript:void(0)" class="btn add-network">
                                    Send Network Request <i class="icon-plus-sign"></i>
                                </a>';
                    else 
                        echo '<br>
                                <a id="'.$key['account_id'].'" href="javascript:void(0)" class="btn add-network">
                                    Add to Network <i class="icon-plus-sign"></i>
                                </a>';
                }
                echo '</div>';
            }
        } else echo "<h5>Search query not found.</h5>";
    }

    echo'</div>';

    if(isset($_GET['see']) && $_GET['see']=='all') $data = RetrieveAllContacts('', $_SESSION['account_id']);
    else $data = RetrieveMyContacts('', $_SESSION['account_id']);
    echo '<div class="my-watchlist">
            <h4>My Network</h4>';
    if($data){
        foreach ($data as $key) {
            echo '  <div id="'.$key['account_id'].'-container" class="watchlist-result">
                        <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&amp;height=200"">
                        <a href="?main=home&inner=user_profile&user_id='.$key['account_id'].'">
                            <span class="fullname know-first">'.$key['name'].'</span>
                        </a><br>
                    </div>';
        }
    }
    echo'</div>
    <a href="?main=home&inner=network&see=all" style="font-size: 18px;margin-left: 12px;">See all people in your Network</a>
    </div>';
}
?>