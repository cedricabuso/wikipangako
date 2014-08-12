<?php
require_once 'global.php';
require_once 'modules/politician/retrieve_politicians.php';

function Politicians(){
    echo '
        <div id="politician-container" class="newsfeed">
            <h2 style="margin-top: -50px;"><img style="padding-top: 35px;padding-bottom: 35px; padding-right: 20px;width: 75px;" src="img/wpcons/politicianicon.png"/>Politicians</h2>
            <hr style="margin-top: -45px;">
            <div id="search-network">
                <form id="search-politicians" name="search-politicians" method="post" action="">
                    <input name="term" type="text" placeholder="Search politician ..." required="required" /><br>
                    <button name="search" class="btn"><i class="icon-search"></i> Search</button>
                </form>
            </div>
            <br>
            <div class="results">';

    if(isset($_POST['search'])){
        $term = $_POST['term'];
        $data = RetrievePoliticians($term);
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
        } else echo "<h5>Search query not found.</h5>";
    }

    echo'   </div>
        </div>';
}
?>