<?php
require_once 'global.php';
require_once 'modules/network/is_contact.php';
require_once 'modules/network/retrieve_account_profile.php';
require_once 'modules/wikip/upload_wikip_facebook.php';
require_once 'modules/wikip/retrieve_wikip_from_account.php';
require_once 'modules/promise/upload_promise.php';
require_once 'modules/settings/account_state.php';

function AccountProfile($account_id){
    global $facebook;

    $data = RetrieveAccountProfile($account_id);
    $object = $facebook->api('/' . $data[0]['facebook_id']);
    $data2 = RetrieveWikiPFromAccount($account_id);

    $is_contact['is_contact']=true;
    if($_SESSION['account_id'] != $account_id && isset($_GET['inner']) && $_GET['inner']=='user_profile'){
        $is_contact = IsContact($_SESSION['account_id'], $account_id);
        $account_state = AccountState($account_id);
    }
    
    echo '<input id="account_id" type="hidden" value="'.$_SESSION['account_id'].'"/>
        <div id="network-container" class="newsfeed">
            <div class="politician-profile">';
    if(!$is_contact['is_contact'] && $account_state[0]['privacy']=='0')
        echo    '<a id="'.$account_id.'" href="javascript:void(0)" class="btn add-network-profile pull-right">
                    Add to Network <i class="icon-plus-sign"></i>
                </a>';
    else if(!$is_contact['is_contact'] && $account_state[0]['privacy']=='1')
        echo    '<a id="'.$account_id.'" href="javascript:void(0)" class="btn add-network-profile pull-right">
                    Send Network Request <i class="icon-plus-sign"></i>
                </a>';

    echo        '<img class="politician-pic pull-left" src="http://graph.facebook.com/'. $data[0]['facebook_id'] .'/picture?width=200&amp;height=200"><br>
                <span class="politician-fullname">'. $object['name'] .'</span><br>
            </div>';
    if($is_contact['is_contact'] || $account_state[0]['privacy']=='0'){
        echo    '<div class="tabbable profile-tab">
                    <ul class="nav nav-tabs polit-nav">
                        <li class="active"><a href="#pane1" data-toggle="tab">WikiPs</a></li>
                        <!--<li><a href="#pane2" data-toggle="tab">Statistics</a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div id="pane1" class="tab-pane active">';
        if(isset($_GET['inner']) && $_GET['inner']=='user_wikip' && isset($_GET['user_id'])){
            UploadPromise();
            UploadWikiPFacebook();
        }
    
        echo '
                <hr class="sort-top">
                    <ul class="sort">
                        <li class="dropdown">
                        <a href="javascript:void(0)" id="sort" class="dropdown-toggle" data-toggle="dropdown">Sort <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Top Stories</a></li>
                                <li><a href="javascript:void(0)">Most Recent</a></li>
                            </ul>
                        </li>
                    </ul>
                <hr class="sort-right">';
        if($data2){
            foreach ($data2 as $key) {
                $caption = str_replace("\n", "<br>", $key['caption']);
                $parsed_name = str_replace(' ', '', $key['name']);
                $parsed_name = str_replace('"', '', $parsed_name);
                $parsed_name = str_replace('.', '', $parsed_name);
                if(!$key['url']){
                    echo'<div id="'.$key['wikip_id'].'" class="post">
                             <div class="news">
                                <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
                    if($account_id==$_SESSION['account_id']){
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
                                <a href="?main=home&inner=user_profile&user_id=' . $account_id . '"><span class="fullname">'. $key['account_name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '">'.$key['caption'].'</a>
                                    <br/><br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                    </span>';
                    echo            '<span class="nav pull-right" style="padding-right: 10px;">
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
                    if($account_id==$_SESSION['account_id']){
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
                                    <a href="?main=home&inner=user_profile&user_id=' . $account_id . '"><span class="fullname">'. $key['account_name'] .'</span></a> posted a WikiP<br><br>
                                    <span class="content comment more">
                                        '.$caption.'<br/>
                                        <a title="View this post" href="?main=home&inner=wikip_url&wikip_id='.$key['wikip_id'].'"><img class="news-pic" src="'.$key['url'].'"></a>
                                    </span>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                    <span class="nav pull-right" style="padding-right: 10px;">
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
            echo        '</div>
                        <div id="pane2" class="tab-pane">
                            <h4>Statistics</h4>
                        </div>';
        } 
    } else echo '<h5>Account is private. Add this person to your network to view his/her profile.</h5>';
    echo            '</div><!-- /.tab-content -->
                </div><!-- /.tabbable -->
            </div>
        </div>';
}
?>