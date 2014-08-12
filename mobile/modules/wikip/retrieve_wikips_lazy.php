<?php
function RetrieveWikipsLazy($last_timestamp, $account_id){
    global $database;
    if($database==null)
        Connect();

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

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data, $row);

    if($data){
        foreach ($data as $key) {
            $key['caption'] = str_replace("\n", "<br>", $key['caption']);
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
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    <a class="caption" title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"> '.$key['caption'].' </a>
                                    <br/><br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>';
                $parsed_name = str_replace(' ', '', $key['name']);
                $parsed_name = str_replace('"', '', $parsed_name);
                echo            '<span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-info btn-small" href="javascript:void(0)" title="Share on Twitter" onclick="popUp(\'https://twitter.com/intent/tweet?text=%20%23wikipangako%20%23'.$parsed_name.' '.$key['caption'].'&url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'].'&related=sharethis&via=wikipangako\', '.$key['wikip_id'].', \'tweet\', \'wikip\');"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet: '.$key['tweet_count'].'</a></span>
                                <span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-primary btn-small" href="javascript:void(0)" title="Share on Facebook" onclick="popUp(\'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'] .'&p[images][0]=' . $key['url'] .'&p[title]=WikiPangako&p[summary]=' . $key['caption'] .'\', '.$key['wikip_id'].', \'share\', \'wikip\');"><img class="social-button" src="../img/glyphicons_facebook.png">Share: '.$key['share_count'].'</a></span>';
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
                $parsed_name = str_replace(' ', '', $key['name']);
                $parsed_name = str_replace('"', '', $parsed_name);
                echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $key['account_name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    '.$key['caption'].'<br/>
                                    <a title="View this post" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"><img class="news-pic" src="'.$key['url'].'"></a>
                                    <br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>
                                <span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-info btn-small" href="javascript:void(0)" title="Share on Twitter" onclick="popUp(\'https://twitter.com/intent/tweet?text=%20%23wikipangako%20%23'.$parsed_name.' '.$key['caption'].'&url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'].'&related=sharethis&via=wikipangako\', '.$key['wikip_id'].', \'tweet\', \'wikip\');"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet: '.$key['tweet_count'].'</a></span>
                                <span class="nav pull-right" style="padding-right: 10px;"><a class="btn btn-primary btn-small" href="javascript:void(0)" title="Share on Facebook" onclick="popUp(\'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'. $key['wikip_id'] .'&p[images][0]=' . $key['url'] .'&p[title]=WikiPangako&p[summary]=' . $key['caption'] .'\', '.$key['wikip_id'].', \'share\', \'wikip\');"><img class="social-button" src="../img/glyphicons_facebook.png">Share: '.$key['share_count'].'</a></span>
                            </div>
                        </div>';
            }
        }
        echo '<script>$("#timestamp").val("'.$key['date_added'].'");</script>';
     }
}
?>