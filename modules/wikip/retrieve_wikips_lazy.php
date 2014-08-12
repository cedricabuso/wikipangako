<?php
function RetrieveWikipsLazy($last_timestamp){
    global $database;
    if($database==null)
        Connect();

    $account_id=$_SESSION['account_id'];
    $result = $database->query("SELECT DISTINCT WIKIP.*, ACCOUNT.facebook_id, ACCOUNT.account_id, ACCOUNT.name 'account_name', POLITICIAN.name, POLITICIAN.politician_id 
                                    FROM WIKIP, ACCOUNT, POLITICIAN, IS_WATCHING, IS_CONTACT
                                    WHERE WIKIP.account_id_fk = ACCOUNT.account_id
                                    AND WIKIP.politician_id_fk = POLITICIAN.politician_id
                                    AND WIKIP.approved = 1
                                    AND WIKIP.is_question=0
                                    AND WIKIP.date_added<'".$last_timestamp."'
                                    AND ((WIKIP.politician_id_fk = IS_WATCHING.politician_id_fk
                                    AND IS_WATCHING.account_id_fk = ".$account_id.")
                                    OR (WIKIP.account_id_fk = IS_CONTACT.account_id1_fk OR WIKIP.account_id_fk = IS_CONTACT.account_id2_fk)
                                    AND (IS_CONTACT.account_id1_fk = ".$account_id." OR IS_CONTACT.account_id2_fk = ".$account_id."))
                                    ORDER BY WIKIP.date_added DESC LIMIT 5"); 

    $data = array();
    if(!empty($result)) while ($row = $result->fetch_assoc()) array_push($data, $row);

    if(!empty($data)){
        foreach ($data as $key) {
            $caption = str_replace("\n", "<br>", $key['caption']);
            $parsed_name = str_replace(' ', '', $key['name']);
            $parsed_name = str_replace('"', '', $parsed_name);
            $tweet_count_url = 'http://urls.api.twitter.com/1/urls/count.json?url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'.$key['wikip_id'];
            $tweet_count_open = fopen($tweet_count_url,"r");
            $tweet_count_read = fread($tweet_count_open,2048);
            fclose($tweet_count_open);
            if(!$key['url']){
                echo    '<div id="'.$key['wikip_id'].'" class="post">
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
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> posted a WikiP<br><br>
                                <span class="content comment more">
                                    <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"> '.$caption.' </a>
                                    <br/><br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>';
                echo            '<span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['wikip_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;"><script>var data = jQuery.parseJSON(\''.$tweet_count_read.'\'); $(".'.$key['wikip_id'].'-tweet-count").text(data.count); </script></p>
                                        </div>
                                    </div>
                                    <a id="'.$key['wikip_id'].'-tweet-wikip" class="btn btn-info btn-small tweet-wikip" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                                </span>
                                <input id="'.$key['wikip_id'].'-tweet-wikip-caption" type="hidden" value="'.$parsed_name.' '.$key['caption'].'" />

                                <span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['wikip_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;"><script>jQuery.getJSON("http://graph.facebook.com/?id=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'.$key['wikip_id'].'").done( function(data) { if(data.shares) $(".'.$key['wikip_id'].'-share-count").text(data.shares); else $(".'.$key['wikip_id'].'-share-count").text("0"); } )</script></p>
                                        </div>
                                    </div>
                                    <a id="'.$key['wikip_id'].'-share-wikip" class="btn btn-primary btn-small share-wikip" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
                                </span>
                                <input id="'.$key['wikip_id'].'-share-wikip-url" type="hidden" value="'.$key['url'].'" />
                                <input id="'.$key['wikip_id'].'-share-wikip-caption" type="hidden" value="'.$key['caption'].'" />';
                if($key['is_question']=='1'){
                    require_once 'modules/wikip/demand_count.php';
                    require_once 'modules/wikip/is_demanded.php';
                    $demand_count = DemandCount($key['wikip_id']);
                    $is_demanded = IsDemanded($key['wikip_id'], $account_id);
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
                if($key['account_id']==$account_id){
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
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> posted a WikiP<br><br>
                                <span class="content comment more">
                                    '.$caption.'<br/>
                                    <a title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"><img class="news-pic" src="'.$key['url'].'"></a>
                                </span>
                                <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                <span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['wikip_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;"><script>var data = jQuery.parseJSON(\''.$tweet_count_read.'\'); $(".'.$key['wikip_id'].'-tweet-count").text(data.count); </script></p>
                                        </div>
                                    </div>
                                    <a id="'.$key['wikip_id'].'-tweet-wikip" class="btn btn-info btn-small tweet-wikip" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                                </span>
                                <input id="'.$key['wikip_id'].'-tweet-wikip-caption" type="hidden" value="'.$parsed_name.' '.$key['caption'].'" />

                                <span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['wikip_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;"><script>jQuery.getJSON("http://graph.facebook.com/?id=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'.$key['wikip_id'].'").done( function(data) { if(data.shares) $(".'.$key['wikip_id'].'-share-count").text(data.shares); else $(".'.$key['wikip_id'].'-share-count").text("0"); } )</script></p>
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
        echo "  <script>
                    !(function (){
                        function popUp(url, id, stats, type){
                            window.open(url, 'WikiPangako', 'status = 1, height = 450, width = 600, resizable = 0');
                            $.post('modules/ajax/ajax.php',
                                {
                                    action: 'incrementStatsCount',
                                    id: id,
                                    stats: stats,
                                    type: type
                                }
                            );
                        }
                        $('#timestamp').val('".$key['date_added']."');
                        $('.share-wikip').click(function(e) {
                            wikip_id = $(this).attr('id');
                            url = $('#'+wikip_id+'-url').val();
                            caption = encodeURIComponent($('#'+wikip_id+'-caption').val());
                            wikip_id = wikip_id.replace('-share-wikip', '');

                            popUp('https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'+wikip_id+'&p[images][0]='+url+'&p[title]=WikiPangako&p[summary]='+caption, wikip_id, 'share', 'wikip');
                        });

                        $('.tweet-wikip').click(function(e) {
                            wikip_id = $(this).attr('id');
                            caption = encodeURIComponent($('#'+$(this).attr('id')+'-caption').val());
                            wikip_id = wikip_id.replace('-tweet-wikip', '');
                            popUp('https://twitter.com/intent/tweet?text=%20%23wikipangako%20%23'+caption+'&url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'+wikip_id+'&related=sharethis&via=wikipangako', wikip_id, 'tweet', 'wikip');
                        });
                    }());
                </script>";
    }
    
}
?>