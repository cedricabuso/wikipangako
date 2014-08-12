<?php
require_once 'global.php';
require_once 'modules/promise/retrieve_projects.php';
require_once 'modules/promise/retrieve_promises.php';
require_once 'modules/promise/upload_promise.php';
require_once 'modules/promise/promise_counts.php';
require_once 'modules/politician/retrieve_politician_profile.php';
require_once 'modules/politician/get_ratings.php';
require_once 'modules/wikip/retrieve_wikip_from_politician.php';
require_once 'modules/wikip/upload_wikip_facebook.php';
require_once 'modules/wikip/upload_wikip_pork.php';
require_once 'modules/watchlist/is_watchlist.php';

function PoliticianProfile(){
    global $facebook;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = RetrievePoliticianProfile($id);
        $data2 = RetrieveWikiPFromPolitician($id);
        $data3 = RetrieveProjects($id);
        $data4 = RetrievePromises($id);
        $data['former_elected_positions'] = str_replace(';', '<br>', $data['former_elected_positions']);
        $data['educational_background'] = str_replace(';', '<br>', $data['educational_background']);

        if(isset($_GET['inner']) && $_GET['inner']=='politician-profile')
            $is_watchlist = IsWatchlist($id, $_SESSION['account_id']);
    }

    echo '
        <div id="network-container" class="newsfeed">
            <div class="politician-profile">';
            if(!$is_watchlist['is_watchlist'])
        echo    '<a id="'.$id.'" href="javascript:void(0)" class="btn add-watchlist pull-right" onclick="addWatchlistProfile('.$id.', '.$_SESSION['account_id'].');"">
                    Add to Watchlist <i class="icon-eye-open"></i>
                </a>';
    echo        '<img class="politician-pic pull-left" src="img/politicians/' . $data['politician_id'].'.jpg"/><br>
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
                    <center><span id="politician-rating">'.$rate.'</span></center>';

    if($rating_data['user_rating']){
        if($rating_data['user_rating'][0]['rating']=='1')
            echo'<button class="btn btn-success rate like" title="Rate Up"><i class="icon-circle-arrow-up icon-white"></i></button>';
        else
            echo '<button class="btn btn-info rate like" title="Rate Up"><i class="icon-circle-arrow-up icon-white"></i></button>';

        if($rating_data['user_rating'][0]['rating']=='0')
            echo'<button class="btn btn-danger rate hate" title="Rate Down"><i class="icon-circle-arrow-down icon-white"></i></button>';
        else
            echo '<button class="btn btn-info rate hate" title="Rate Down"><i class="icon-circle-arrow-down icon-white"></i></button>';
    }
    else
        echo '<button class="btn btn-info rate like" title="Rate Up"><i class="icon-circle-arrow-up icon-white"></i></button>
                       <button class="btn btn-info rate hate" title="Rate Down"><i class="icon-circle-arrow-down icon-white"></i></button>';

    echo    '<input type="hidden" id="account-id" value="'.$_SESSION['account_id'].'"/>
                    <input type="hidden" id="politician-id" value="'.$id.'"/>
                </div>';

    echo    '<div class="tabbable politician-tab">
                <ul class="nav nav-tabs polit-nav">
                    <li class="active"><a href="#pane1" data-toggle="tab">WikiPs</a></li>
                    <li><a href="#pane2" data-toggle="tab">Profile</a></li>
                    <li><a href="#pane3" data-toggle="tab">Statistics</a></li>
                    <li><a href="#pane4" data-toggle="tab">Answers</a></li>
                    <li><a href="#pane5" data-toggle="tab">Project Update</a></li>
                    <li><a href="#pane6" data-toggle="tab" style="color: #bd362f;font-size: 20px;font-weight: bold;font-family: cursive;">#PangakoWatch</a></li>
                </ul>
                <div class="tab-content">
                    <div id="pane1" class="tab-pane active">';
    UploadWikiPFacebook();
    echo            '
                        <hr class="sort-top">
                            <ul class="sort">
                                <li class="dropdown">
                                <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown">Sort <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Top Stories</a></li>
                                        <li><a href="#">Most Recent</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <hr class="sort-right">';

    if($data2){
        foreach ($data2 as $key) {
            $object = $facebook->api('/' . $key['facebook_id']);
            $key['caption'] = str_replace("\n", "<br>", $key['caption']);
            if(!$key['url']){
                echo'<div id="'.$key['wikip_id'].'" class="post">
                         <div class="news">
                            <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
                if($key['account_id']==$_SESSION['account_id']){
                    echo        '<ul class="wikip-menu sort pull-right">
                                    <li class="dropdown pull-right">
                                    <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="close">&times;</button></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)" onclick="deleteWikip('.$key['wikip_id'].');">Delete WikiP</a></li>
                                        </ul>
                                    </li>
                                </ul>';
                }
                echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                            <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
                            <span class="content comment more">
                                <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '">'.$key['caption'].'</a>
                                <br/><br/>
                                <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>';
                echo            '<span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-info btn-small" href="javascript:void(0)" title="Share on Twitter" onclick="popUp(\'https://twitter.com/intent/tweet?text=' . $key['caption'] .'&url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'] .'&related=sharethis&via=wikipangako\');"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a></span>
                                <span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-primary btn-small" href="javascript:void(0)" title="Share on Facebook" onclick="popUp(\'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'] .'&p[images][0]=' . $key['url'] .'&p[title]=WikiPangako&p[summary]=' . $key['caption'] .'\');"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a></span>';
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
            }
            else{
                echo    '<div id="'.$key['wikip_id'].'" class="post">
                            <div class="news">
                                <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
                if($key['account_id']==$_SESSION['account_id']){
                echo            '<ul class="wikip-menu sort pull-right">
                                    <li class="dropdown pull-right">
                                    <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="close">&times;</button></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)" onclick="deleteWikip('.$key['wikip_id'].');">Delete WikiP</a></li>
                                        </ul>
                                    </li>
                                </ul>';
                }
                echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    '.$key['caption'].'<br/>
                                    <a title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"><img class="news-pic" src="'.$key['url'].'"></a>
                                    <br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>
                                <span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-info btn-small" href="javascript:void(0)" title="Share on Twitter" onclick="popUp(\'https://twitter.com/intent/tweet?text=' . $key['caption'] .'&url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'] .'&related=sharethis&via=wikipangako\');"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a></span>
                                <span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-primary btn-small" href="javascript:void(0)" title="Share on Facebook" onclick="popUp(\'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'] .'&p[images][0]=' . $key['url'] .'&p[title]=WikiPangako&p[summary]=' . $key['caption'] .'\');"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a></span>
                            </div>
                        </div>';
            }
        }
    }
    echo '          </div>
                    <div id="pane2" class="tab-pane">
                        <h4>Profile</h4>
                        <div>
                            <table>
                                <tr>
                                    <td class="info-left">Birthday:</td><td class="politician-birthday">'.$data['birthday'].'<br><br></td>
                                </tr>
                                <tr>
                                    <td class="info-left">Educational Background:</td><td class="politician-background">'.$data['educational_background'].'<br></td>
                                </tr>
                                </tr>
                                    <td class="info-left">Former Elected Positions:</td><td class="politician-elected">'.$data['former_elected_positions'].'<br><br></td>
                                <tr>
                                    <td class="info-left">Political Party:</td><td class="politician-party">'.$data['political_party'].'</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="pane3" class="tab-pane">
                        <h4>Statistics</h4>
                    </div>
                    <div id="pane4" class="tab-pane">
                        <h4>Answers</h4>
                    </div>
                    <div id="pane5" class="tab-pane">
                        <h4>Project Update</h4>
                        <br>
                        <div id="accordion">';
    if($data3){
        foreach ($data3 as $key) {
            $data5 = PromiseCount($_SESSION['account_id'], $key['promise_id']);
            if($data5['done'][0]['done']==0 && $data5['inprogress'][0]['inprogress']==0 && $data5['failed'][0]['failed']==0)
                $people_say = 'This project/promise is still unrated.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['done'][0]['done'] )
                $people_say = 'Most people say this is <b style="color: #51a351;">Finished</b>.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['inprogress'][0]['inprogress'] )
                $people_say = 'Most people say this is <b style="color: #2f96b4">In Progress</b>.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['failed'][0]['failed'] )
                $people_say = 'Most people say this is <b style="color: #bd362f;">Napako</b>.';

            echo '      <h3>'.$key['name'].' <span class="pull-right" style="font-size: 12px;font-style: italic;">'.$people_say.'</span></h3>
                            <div>
                                <p>'.$key['details'].'</p>';
                                UploadWikiPork($id, $key['promise_id']);
            echo            '</div>';
        }
    }
    echo                '</div>
                    </div>
                    <div id="pane6" class="tab-pane">
                        <div class="pull-right" style="margin-top: -35px;">';
                            UploadPromise();
    echo                '</div>
                        <h4>Promises</h4>
                        <div id="accordion-promise">';
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

            $key['sources'] = str_replace(';', '<br>', $key['sources']);

            echo '      <h3>'.$key['name'].' <span class="pull-right" style="font-size: 12px;font-style: italic;">'.$people_say.'</span></h3>
                            <div>
                                <p>'.$key['details'].'</p>
                                <p>'.$key['sources'].'</p>';
            echo                '<div class="btn-group pull-right">';
                    if($data5['is_selected'] && $data5['is_selected'][0]['status']=='1')
                        echo        '<button id="'.$key['promise_id'].'-finished" class="btn btn-success finished active" onclick="ratePromise(1, '.$_SESSION['account_id'].', '.$key['promise_id'].', \''.$key['promise_id'].'-finished\');"><i class="icon-white icon-ok"></i> Finished | <b class="finished-count">'.$data5['done'][0]['done'].'</b></button>';
                    else
                        echo        '<button id="'.$key['promise_id'].'-finished" class="btn btn-inverse finished" onclick="ratePromise(1, '.$_SESSION['account_id'].', '.$key['promise_id'].', \''.$key['promise_id'].'-finished\');"><i class="icon-white icon-ok"></i> Finished | <b class="finished-count">'.$data5['done'][0]['done'].'</b></button>'; 
                    if($data5['is_selected'] && $data5['is_selected'][0]['status']=='2')
                        echo        '<button id="'.$key['promise_id'].'-inprogress" class="btn btn-warning inprogress active" onclick="ratePromise(2, '.$_SESSION['account_id'].', '.$key['promise_id'].', \''.$key['promise_id'].'-inprogress\');"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data5['inprogress'][0]['inprogress'].'</b></button>';
                    else
                        echo        '<button id="'.$key['promise_id'].'-inprogress" class="btn btn-inverse inprogress" onclick="ratePromise(2, '.$_SESSION['account_id'].', '.$key['promise_id'].', \''.$key['promise_id'].'-inprogress\');"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data5['inprogress'][0]['inprogress'].'</b></button>';
                    if($data5['is_selected'] && $data5['is_selected'][0]['status']=='4')
                        echo        '<button id="'.$key['promise_id'].'-failed" class="btn btn-danger failed active" onclick="ratePromise(4, '.$_SESSION['account_id'].', '.$key['promise_id'].', \''.$key['promise_id'].'-failed\');"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data5['failed'][0]['failed'].'</b></button>';
                    else
                        echo        '<button id="'.$key['promise_id'].'-failed" class="btn btn-inverse failed" onclick="ratePromise(4, '.$_SESSION['account_id'].', '.$key['promise_id'].', \''.$key['promise_id'].'-failed\');"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data5['failed'][0]['failed'].'</b></button>';

    echo                        '</div>
                            <div>';
        }
    }
    echo                '</div>
                    </div>
                    </div>
                    </div>
                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->
        </div>';
}
?>