<?php
require_once 'global.php';
require_once 'modules/wikip/retrieve_wikips.php';
require_once 'modules/wikip/retrieve_active_wikips.php';
require_once 'modules/promise/get_promises.php';
require_once 'modules/promise/get_active_promises.php';
require_once 'modules/promise/promise_counts.php';

function generateWikip($key){
    $caption = str_replace("\n", "<br>", $key['caption']);
    $parsed_name = str_replace(' ', '', $key['name']);
    $parsed_name = str_replace('"', '', $parsed_name);
    $parsed_name = str_replace('.', '', $parsed_name);
    if(!$key['url']){
        echo    '<div id="'.$key['wikip_id'].'" class="post">
                    <div class="news">
                        <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
        if($key['account_id']==$_SESSION['account_id']){
            echo        '<ul class="wikip-menu sort pull-right">
                            <li class="dropdown pull-right">
                            <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="close">&times;</button></a>
                                <ul class="dropdown-menu">
                                    <li><a id="'.$key['wikip_id'].'-delete" href="javascript:void(0)" class="delete-wikip">Delete WikiP</a></li>
                                </ul>
                            </li>
                        </ul>';
        }
        echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                        <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> posted a WikiP<br><br>
                        <span class="content comment more">
                            <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"> '.$caption.' </a>
                            <br/><br/>
                            <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                        </span>';
        echo            '<br><br><span class="nav pull-right" style="padding-right: 10px;">
                            <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                <div class="arrow"></div>
                                <div class="popover-content" style="padding: 0px 6px;">
                                    <p class="'.$key['promise_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;">'.$key['tweet_count'].'</p>
                                </div>
                            </div>
                            <a id="'.$key['promise_id'].'-tweet-promise" class="btn btn-info btn-small tweet-promise" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                        </span>
                        <input id="'.$key['promise_id'].'-tweet-promise-details" type="hidden" value="'.$parsed_name.' '.$key['details'].'" />
                        <span class="nav pull-right" style="padding-right: 10px;">
                            <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                <div class="arrow"></div>
                                <div class="popover-content" style="padding: 0px 6px;">
                                    <p class="'.$key['promise_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;">'.$key['share_count'].'</p>
                                </div>
                            </div>
                            <a id="'.$key['promise_id'].'-share-promise" class="btn btn-primary btn-small share-promise" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
                        </span>
                        <input id="'.$key['wikip_id'].'-share-wikip-url" type="hidden" value="'.$key['url'].'" />
                        <input id="'.$key['wikip_id'].'-share-wikip-caption" type="hidden" value="'.$key['caption'].'" />';
        if($key['is_question']=='1'){
            require_once 'modules/wikip/demand_count.php';
            require_once 'modules/wikip/is_demanded.php';
            $demand_count = DemandCount($key['wikip_id']);
            $is_demanded = IsDemanded($key['wikip_id'], $_SESSION['account_id']);
            if(!$is_demanded['is_demanded'])
                echo    '<span class="nav pull-right" style="padding-right: 10px;"><span style="padding-right: 10px; font-size: 14px;font-style: italic;"><b id="'.$key['wikip_id'].'-demand" style="font-size:20px;">'.$demand_count[0]['demand'].'</b> people demanded an answer to this.</span><a id="'.$key['wikip_id'].'-demand-btn" class="btn btn-inverse btn-small" href="javascript:void(0)" title="Demand Answer" onclick="demandAnswer('.$key['wikip_id'].', '.$_SESSION['account_id'].');">Demand Answer</a></span>';
            else
                echo    '<span class="nav pull-right" style="padding-right: 10px;"><span style="padding-right: 10px; font-size: 14px;font-style: italic;"><b id="'.$key['wikip_id'].'-demand" style="font-size:20px;">'.$demand_count[0]['demand'].'</b> people demanded an answer to this.</span><a id="'.$key['wikip_id'].'-demand-btn" class="btn btn-success btn-small" href="javascript:void(0)" title="Demand Answer" onclick="demandAnswer('.$key['wikip_id'].', '.$_SESSION['account_id'].');">Demand Answer</a></span>';
        }
        echo       '</div>
                </div>';
    } else{
        echo    '<div id="'.$key['wikip_id'].'" class="post">
                    <div class="news">
                        <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
        if($key['account_id']==$_SESSION['account_id']){
        echo            '<ul class="wikip-menu sort pull-right">
                            <li class="dropdown pull-right">
                            <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="close">&times;</button></a>
                                <ul class="dropdown-menu">
                                    <li><a id="'.$key['wikip_id'].'-delete" href="javascript:void(0)" class="delete-wikip">Delete WikiP</a></li>
                                </ul>
                            </li>
                        </ul>';
        }
        echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                        <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> posted a WikiP<br><br>
                        <span class="content comment more">
                            '.$caption.'<br/>
                            <a title="View this post" href="?main=home&inner=wikip_url&wikip_id='.$key['wikip_id'].'"><img class="news-pic" src="'.$key['url'].'"></a>
                        </span>
                        <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                        <br><br><span class="nav pull-right" style="padding-right: 10px;">
                            <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                <div class="arrow"></div>
                                <div class="popover-content" style="padding: 0px 6px;">
                                    <p class="'.$key['wikip_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;">'.$key['tweet_count'].'</p>
                                </div>
                            </div>
                            <a id="'.$key['wikip_id'].'-tweet-wikip" class="btn btn-info btn-small tweet-wikip" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                        </span>
                        <input id="'.$key['wikip_id'].'-tweet-wikip-caption" type="hidden" value="'.$parsed_name.' '.$key['caption'].'" />

                        <span class="nav pull-right" style="padding-right: 10px;">
                            <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                <div class="arrow"></div>
                                <div class="popover-content" style="padding: 0px 6px;">
                                    <p class="'.$key['wikip_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;">'.$key['share_count'].'</p>
                                </div>
                            </div>
                            <a id="'.$key['wikip_id'].'-share-wikip" class="btn btn-primary btn-small share-wikip" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
                        </span>
                        <input id="'.$key['wikip_id'].'-share-wikip-url" type="hidden" value="'.$key['url'].'" />
                        <input id="'.$key['wikip_id'].'-share-wikip-caption" type="hidden" value="'.$key['caption'].'" />
                    </div>
                </div>';
    }
}

function generatePromise($key){
    $data5 = PromiseCount($_SESSION['account_id'], $key['promise_id']);
    if($data5['done'][0]['done']==0 && $data5['inprogress'][0]['inprogress']==0 && $data5['failed'][0]['failed']==0)
        $people_say = 'This project/promise is still unrated.';
    else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['done'][0]['done'] )
        $people_say = 'Most people say this is <b style="color: #51a351;">Fulfilled</b>.';
    else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['inprogress'][0]['inprogress'] )
        $people_say = 'Most people say this is <b style="color: #2f96b4">In Progress</b>.';
    else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['failed'][0]['failed'] )
        $people_say = 'Most people say this is <b style="color: #bd362f;">Napako</b>.';

    $parsed_name = str_replace(' ', '', $key['politician_name']);
    $parsed_name = str_replace('"', '', $parsed_name);
    $parsed_name = str_replace('.', '', $parsed_name);
    $tokenize = explode(",", $key['sources']);
    echo    '<div id="'.$key['promise_id'].'" class="post">
                    <div class="news">
                        <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
        if($key['account_id_fk']==$_SESSION['account_id']){
            echo        '<ul class="wikip-menu sort pull-right">
                            <li class="dropdown pull-right">
                            <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="close">&times;</button></a>
                                <ul class="dropdown-menu">
                                    <li><a id="'.$key['promise_id'].'-delete" href="javascript:void(0)" class="delete-promise">Delete Promise</a></li>
                                </ul>
                            </li>
                        </ul>';
        }
        echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                        <a href="?main=home&inner=user_profile&user_id=' . $key['account_id_fk'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> cited a Promise<br><br>
        
                        <img class="pic pull-left" src="img/politicians/'.$key['politician_id_fk'].'.jpg" style="margin-left: 5px;width: 70px;height: 70px;"/>
                        <a href="?main=home&inner=politician-profile&id='.$key['politician_id_fk'].'" <span class="fullname">'.$key['politician_name'].'</span><br><br></a>
                        <span class="content comment">
                            <a title="View this post" href="?main=home&inner=promise_url&promise_id='. $key['promise_id'] . '"><b>'.$key['name'].'</b></a> <span class="pull-right" style="font-size: 14px;font-style: italic;">'.$people_say.'</span><br>
                            '.$key['details'].'<br>';
                    foreach($tokenize as $value) {
                        echo  '<p><a href="'.$value.'" target="_blank">'.$value.'</a></p>';
                    }
                if($key['category']!=null) echo '<p><b>Category: </b>'.$key['category'].'</p>';
                echo    '</span><br><br>
                        <span class="nav pull-right" style="padding-right: 10px;">
                            <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                <div class="arrow"></div>
                                <div class="popover-content" style="padding: 0px 6px;">
                                    <p class="'.$key['promise_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;">'.$key['tweet_count'].'</p>
                                </div>
                            </div>
                            <a id="'.$key['promise_id'].'-tweet-promise" class="btn btn-info btn-small tweet-promise" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                        </span>
                        <input id="'.$key['promise_id'].'-tweet-promise-details" type="hidden" value="'.$parsed_name.' '.$key['details'].'" />

                        <span class="nav pull-right" style="padding-right: 10px;">
                            <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                <div class="arrow"></div>
                                <div class="popover-content" style="padding: 0px 6px;">
                                    <p class="'.$key['promise_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;">'.$key['share_count'].'</p>
                                </div>
                            </div>
                            <a id="'.$key['promise_id'].'-share-promise" class="btn btn-primary btn-small share-promise" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
                        </span>
                        <input id="'.$key['promise_id'].'-share-promise-name" type="hidden" value="'.$key['name'].'" />
                        <input id="'.$key['promise_id'].'-share-promise-details" type="hidden" value="'.$key['details'].'" />
                        <input id="'.$key['promise_id'].'-share-promise-politician" type="hidden" value="'.$key['politician_id_fk'].'" />
                        <input id="'.$key['promise_id'].'-share-promise-politician-name" type="hidden" value="'.$key['politician_name'].'" />
                    </div>
            </div>';
}

function NewsFeed(){
    global $facebook;

    $data = null;
    $data2 = null;
    if(isset($_GET['sort']) && $_GET['sort']=='wikips') $data = RetrieveActiveWikiPs();
    else if(isset($_GET['sort']) && $_GET['sort']=='promises') $data2 = GetActivePromises($_SESSION['account_id']);
    else {
        $data = RetrieveWikiPs(null, $_SESSION['account_id']);
        $data2 = GetPromises($_SESSION['account_id']);
        $result = array_merge($data, $data2);
        usort($result, 'compare_date');
    }
    echo '
        <div class="newsfeed">
            <h2><img style="padding-right: 20px;width: 75px;" src="img/wpcons/newsfeed2.png"/>News Feed</h2>
            <hr class="sort-top">
                <ul class="sort">
                    <li class="dropdown">
                    <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown">Sort <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?main=home">All</a></li>
                            <li><a href="?main=home&sort=wikips">Wikips - Most Active</a></li>
                            <li><a href="?main=home&sort=promises">Promises - Most Active</a></li>
                        </ul>
                    </li>
                </ul>
            <hr class="sort-right">';
    if($result){
        foreach ($result as $key) {
            if(isset($key['wikip_id']) && !empty($key['wikip_id'])) generateWikip($key);
            else if(isset($key['promise_id']) && !empty($key['promise_id'])) generatePromise($key);
        }
    } else if($data2 && $_GET['sort']=='promises'){
        foreach ($data2 as $key) {
            generatePromise($key);
        }
    } else if($data && $_GET['sort']=='wikips'){
        foreach ($data as $key) {
            generateWikip($key);
        }
    }
    echo '<input type="hidden" name="timestamp" id="timestamp" value="'.$key['date_added'].'"/>';
    echo '</div>';
}
?>