<?php
require_once 'global.php';
require_once 'modules/watchlist/retrieve_politicians_watchlist.php';
require_once 'modules/watchlist/retrieve_my_watchlist_search.php';
require_once 'modules/watchlist/retrieve_my_watchlist.php';
require_once 'modules/watchlist/retrieve_all_watchlist.php';

function Watchlist(){
    echo '
        <input id="account_id" type="hidden" value="'.$_SESSION['account_id'].'"/>
        <div id="network-container" class="newsfeed">
            <h2 style="margin-top: -45px;"><img style="padding-top: 35px;padding-bottom: 45px; padding-right: 20px;width: 75px;" src="img/wpcons/watchlisticon.png"/>Watchlist</h2>
            <hr style="margin-top: -45px;">
            <div id="search-watchlist" class="input-append">
                <form id="search-watchlist" name="search-watchlist" method="post" action="">
                    <input name="watch" type="text" placeholder="Search Politician..." />
                    <button name="search" class="btn add-on"><i class="icon-search"></i></button>
                    <br/>
                    <input type="radio" id="watchlist" name="filter" value="watchlist" checked="checked"><label class="net-label" for="network">In Your Watchlist</label>
                    <input type="radio" id="wikipangako" name="filter" value="wikipangako"><label class="net-label" for="wikipangako">In WikiPangako</label>
                </form>
            </div>
            <br>
            <div class="results">';

    if(isset($_POST['search'])){
        $name = $_POST['watch'];
        if($_POST['filter']=='wikipangako')
            $data = RetrievePoliticiansWatchlist($name, $_SESSION['account_id']);
        else
            $data = RetrieveMyWatchlistSearch($name, $_SESSION['account_id']);


        foreach ($data as $key) {
            echo '  <div id="'.$key['politician_id'].'-container" class="watchlist-result">
                        <img class="pic pull-left" src="img/politicians/' . $key['politician_id'].'.jpg">
                        <a href="?main=home&inner=politician-profile&id='.$key['politician_id'].'">
                            <span class="fullname know-first">'.$key['name'].'</span>
                        </a><br>
                        <span class="subtitle pull-left">'.$key['position'].'</span><br>
                        ';

                        if($_POST['filter']=='wikipangako')
                        echo    '<a id="'.$key['politician_id'].'" href="javascript:void(0)" class="btn add-watchlist">
                                    Add to Watchlist <i class="icon-eye-open"></i>
                                </a>';

                    echo '</div>';
        }
    }
    echo'</div>';

    if(isset($_GET['see']) && $_GET['see']=='all') $data = RetrieveAllWatchlist($_SESSION['account_id']);
    else $data = $data = RetrieveMyWatchlist($_SESSION['account_id']);
    echo '<div class="my-watchlist">
            <h4>My Watchlist</h4>';
    if($data){
        foreach ($data as $key) {
            echo '  <div id="'.$key['politician_id'].'-container" class="watchlist-result">
                        <img class="pic pull-left" src="img/politicians/' . $key['politician_id'].'.jpg">
                        <a href="?main=home&inner=politician-profile&id='.$key['politician_id'].'">
                            <span class="fullname know-first">'.$key['name'].'</span>
                        </a><br>
                        <span class="subtitle pull-left">'.$key['position'].'</span><br>
                    </div>';
        }
    }

    echo'</div>
    <a href="?main=home&inner=watchlist&see=all" style="font-size: 18px;margin-left: 12px;">See all people in your Watchlist</a>
    </div>';
}
?>