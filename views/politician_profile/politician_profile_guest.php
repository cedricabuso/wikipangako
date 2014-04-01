<?php
require_once 'global.php';
require_once 'modules/promise/retrieve_projects.php';
require_once 'modules/promise/retrieve_promises.php';
require_once 'modules/promise/promise_counts.php';
require_once 'modules/politician/retrieve_politician_profile.php';
require_once 'modules/politician/get_ratings.php';
require_once 'modules/wikip/retrieve_wikip_from_politician.php';

function PoliticianProfileGuest(){
    global $facebook;

    if(isset($_GET['id']) && $_GET['id']!="" && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $data = RetrievePoliticianProfile($id);
        $data2 = RetrieveWikiPFromPolitician($id);
        $data3 = RetrieveProjects($id);
        $data4 = RetrievePromises($id);

    echo '
        <input id="politician_id" type="hidden" value="'.$id.'"/>
        <div id="network-container" class="newsfeed">
            <div class="politician-profile">';
    $parsed_name = str_replace(' ', '', $data['name']);
    $parsed_name = str_replace('"', '', $parsed_name);
    echo        '<span class="nav pull-right" style="padding-right: 10px;">
                    <br><br>
                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                        <div class="arrow"></div>
                        <div class="popover-content" style="padding: 0px 6px;">
                            <p class="prof-tweet-count" style="margin: 0 3px 5px; text-align: center;">'.$data['tweet_count'].'</p>
                        </div>
                    </div>
                    <a class="tweet-profile btn btn-info btn-small" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                </span>
                <input class="tweet-profile-name" type="hidden" value="'.$parsed_name.'">
                <span class="nav pull-right" style="padding-right: 10px;">
                    <br><br>
                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                        <div class="arrow"></div>
                        <div class="popover-content" style="padding: 0px 6px;">
                            <p class="prof-share-count" style="margin: 0 3px 5px; text-align: center;">'.$data['share_count'].'</p>
                        </div>
                    </div>
                    <a class="share-profile btn btn-primary btn-small" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
                </span>
                <input class="share-profile-name" type="hidden" value="'.str_replace('"', '', $data['name']).'">
                <img class="politician-pic pull-left" src="img/politicians/' . $data['politician_id'].'.jpg"/><br>
                <span class="politician-fullname">'.$data['name'].'</span><br>
                <span class="politician-subtitle politician-position">'.$data['position'].'</span><br>
                <span class="politician-subtitle politician-municipal">'.$data['city'].'</span><br>
                <span class="politician-subtitle politician-region">'.$data['province'].'</span>
            </div>';
    $rating_data = GetRatings($_SESSION['account_id'],$id);
    if(empty($rating_data['like']) || empty($rating_data['hate']) || empty($rating_data['user_rating']))
        $rate = 0;
    else
        $rate = $rating_data['like'][0]['like'] - $rating_data['hate'][0]['hate'];

    echo '
                <div class="politician-rate pull-right">
                    <center><span id="politician-rating">'.$rate.'</span></center>
                </div>';

    $json = json_decode(file_get_contents('http://en.wikipedia.org/w/api.php?action=parse&format=json&page='.$data['wikipedia_id']), true);
    $profile = str_replace('href="', 'target="_blank" href="http://en.wikipedia.org', $json['parse']['text']['*']);
    echo    '<div class="tabbable politician-tab">
                <ul class="nav nav-tabs polit-nav">
                    <li class="active"><a href="#pane1" data-toggle="tab">Profile</a></li>
                    <li><a href="#pane2" data-toggle="tab">Pangako</a></li>
                    <li><a href="#pane3" data-toggle="tab">WikiPs</a></li>
                </ul>
                <div class="tab-content">
                    <div id="pane1" class="tab-pane active">
                        <div>'.$profile.'</div>
                    </div>

                    <div id="pane3" class="tab-pane">';
    echo                '<hr class="sort-top">';

    if($data2){
        foreach ($data2 as $key) {
            $caption = str_replace("\n", "<br>", $key['caption']);
            $parsed_name = str_replace(' ', '', $key['name']);
            $parsed_name = str_replace('"', '', $parsed_name);
            if(!$key['url']){
                echo'<div id="'.$key['wikip_id'].'" class="post">
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
                echo        '<span class="date pull-right">'.$key['date_added'].'</span>
                            <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span><br><br></a>
                            <span class="content comment more">
                                <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '">'.$key['caption'].'</a>
                                <br/><br/>
                                <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>';
                echo            '<br><br><span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['wikip_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;">'.$key['tweet_count'].'</p>
                                        </div>
                                    </div>
                                    <a id="'.$key['wikip_id'].'-tweet-promise" class="btn btn-info btn-small tweet-promise" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                                </span>
                                <input id="'.$key['wikip_id'].'-tweet-promise-details" type="hidden" value="'.$parsed_name.' '.$key['details'].'" />

                                <span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['wikip_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;">'.$key['share_count'].'</p>
                                        </div>
                                    </div>
                                    <a id="'.$key['wikip_id'].'-share-promise" class="btn btn-primary btn-small share-promise" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
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
    }
    echo '          </div>';
    echo            '<div id="pane2" class="tab-pane">
                        <h4>Promises</h4>';
    if($data4){
        foreach ($data4 as $key) {
            $data5 = PromiseCount($_SESSION['account_id'], $key['promise_id']);
            if($data5['done'][0]['done']==0 && $data5['inprogress'][0]['inprogress']==0 && $data5['failed'][0]['failed']==0)
                $people_say = 'This project/promise is still unrated.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['done'][0]['done'] )
                $people_say = 'Most people say this is <b style="color: #51a351;">Finished</b>.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['inprogress'][0]['inprogress'] )
                $people_say = 'Most people say this is <b style="color: #2f96b4">In Progress</b>.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['failed'][0]['failed'] )
                $people_say = 'Most people say this is <b style="color: #bd362f;">Napako</b>.';

            $parsed_name = str_replace(' ', '', $key['politician_name']);
            $parsed_name = str_replace('"', '', $parsed_name);
                echo    '<ul>
                            <li>
                                <a href="javascript:void(0)" class="head btn">
                                    <b>'.$key['name'].'</b> <span class="pull-right" style="font-size: 14px;font-style: italic;">'.$people_say.'</span>
                                </a>
                                <div class="content">
                                    <span class="date pull-right">'.$key['date_added'].'</span>
                                    <p>'.$key['details'].'</p>';
                if($key['category']!=null) echo '<p><b>Category: </b>'.$key['category'].'</p>';
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
                                    <input id="'.$key['promise_id'].'-share-promise-name" type="hidden" value="'.$key['name'].'" />
                                    <input id="'.$key['promise_id'].'-share-promise-details" type="hidden" value="'.$key['details'].'" />
                                    <input id="'.$key['promise_id'].'-share-promise-politician" type="hidden" value="'.$key['politician_id_fk'].'" />
                                    <input id="'.$key['promise_id'].'-share-promise-politician-name" type="hidden" value="'.$key['politician_name'].'" />
                                    <br><br>
                                    <p class="btn-group" style="text-align: right; margin-top: 6px;font-size: 1;">';
                            if($data5['is_selected'] && $data5['is_selected'][0]['status']=='1')
                                echo '<button id="'.$key['promise_id'].'-finished" class="btn btn-success finished active"><i class="icon-white icon-ok"></i> Finished | <b class="finished-count">'.$data5['done'][0]['done'].'</b></button>';
                            else
                                echo '<button id="'.$key['promise_id'].'-finished" class="btn btn-inverse finished"><i class="icon-white icon-ok"></i> Finished | <b class="finished-count">'.$data5['done'][0]['done'].'</b></button>'; 
                            if($data5['is_selected'] && $data5['is_selected'][0]['status']=='2')
                                echo '<button id="'.$key['promise_id'].'-inprogress" class="btn btn-warning inprogress active"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data5['inprogress'][0]['inprogress'].'</b></button>';
                            else
                                echo '<button id="'.$key['promise_id'].'-inprogress" class="btn btn-inverse inprogress"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data5['inprogress'][0]['inprogress'].'</b></button>';
                            if($data5['is_selected'] && $data5['is_selected'][0]['status']=='4')
                                echo '<button id="'.$key['promise_id'].'-failed" class="btn btn-danger failed active"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data5['failed'][0]['failed'].'</b></button>';
                            else
                                echo '<button id="'.$key['promise_id'].'-failed" class="btn btn-inverse failed"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data5['failed'][0]['failed'].'</b></button>';

            echo                    '</p>
                                </div>
                            </li>
                        </ul>';
        }
    }
    echo            '</div>
                </div>
            </div>
        </div><!-- /.tab-content -->
    </div><!-- /.tabbable -->
</div>';
}
}
?>