<?php
require_once 'global.php';
require_once 'modules/search/search.php';

function Search(){    
    $term = $_POST['term'];
    $data = SearchTerm($term);
    
    echo '<div id="politician-container" class="newsfeed">
                <h4>Search Results for \''.$term.'\'</h4> 
                <hr>
                <div id="search-network">';
    if($data['politician'])
        foreach($data['politician'] as $key)
            echo '
                    <img class="pic pull-left" src="img/politicians/'.$key['politician_id'].'.jpg" style="margin-left: 5px;width: 70px;height: 70px;"/>
                    <a href="?main=home&inner=politician-profile&id='.$key['politician_id'].'" <span class="fullname">'.$key['name'].'</span><br></a>
                    <span class="fullname">'.$key['position'].'</span><br>
                    <span class="fullname">'.$key['province'].'</span> <span class="fullname">'.$key['city'].'</span>
                    <hr>';

    if($data['network'])
        foreach($data['network'] as $key)
            echo '
                    <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">
                    <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['name'] .'</span></a><br><br><br><br>
                    <hr>';

    if($data['wikips'])
        foreach($data['wikips'] as $key)
            echo '
                    <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">
                    <a href="?main=home&inner=user_profile&user_id=' . $key['account_id_fk'] . '"><span class="fullname">'. $key['name'] .'</span></a><br><br>
                    <span class="content comment">
                        <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"> '.$key['caption'].' </a>
                    </span>
                    <br><br>
                    <hr>';

    if($data['promises'])
        foreach($data['promises'] as $key)
            echo '
                    <img class="pic pull-left" src="img/politicians/'.$key['politician_id_fk'].'.jpg" style="margin-left: 5px;width: 70px;height: 70px;"/>
                    <a href="?main=home&inner=politician-profile&id='.$key['politician_id_fk'].'" <span class="fullname">'.$key['politician_name'].'</span></a><br><br>
                    <span class="content comment">
                        <a title="View this post" href="?main=home&inner=promise_url&promise_id='. $key['promise_id'] . '"><b>'.$key['name'].'</b></a><br>
                        '.$key['details'].'<br>
                    </span>
                    <br><br>
                    <hr>';

    echo '
                </div>
            </div>';
}
?>