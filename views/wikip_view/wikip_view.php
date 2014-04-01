<?php
require_once 'global.php';
require_once 'modules/wikip/retrieve_one_wikip.php';

function WikipView($wikip_id){
    global $facebook;

    $data = RetrieveOneWikiP($wikip_id);

    echo '
        <input id="account_id" type="hidden" value="'.$_SESSION['account_id'].'"/>
        <div class="newsfeed">
            <hr>';
    if($data){
        foreach ($data as $key) {
            $caption = str_replace("\n", "<br>", $key['caption']);
            $parsed_name = str_replace(' ', '', $key['name']);
            $parsed_name = str_replace('"', '', $parsed_name);
            $parsed_name = str_replace('.', '', $parsed_name);
            if(!$key['url'])
                echo    '<div class="post">
                         <div class="news">
                            <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">
                            <span class="date pull-right">'.$key['date_added'].'</span>
                            <span class="fullname">'. $key['account_name'] .'</span><br><br>
                            <span class="content">
                                '.$caption.'
                                <br/>
                                <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                            </span>
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
           else{
                echo    '<div id="'.$key['wikip_id'].'" class="post">
                            <div class="news">
                                <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
                echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id_fk'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> posted a WikiP<br><br>
                                <span class="content">
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
    }
    echo '</div>';
}
?>