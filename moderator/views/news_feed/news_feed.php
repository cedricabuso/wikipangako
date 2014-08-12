<?php
require_once 'global.php';
require_once 'moderator/modules/retrieve_unapproved_wikips.php';

function NewsFeed(){
    global $facebook;

    $data = RetrieveUnapprovedWikiPs();

    echo '
        <div class="newsfeed">
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
  	if($data){
        foreach ($data as $key) {
            $object = $facebook->api('/' . $key['facebook_id']);
            if(!$key['url']){
	            echo    '<div id="'.$key['wikip_id'].'" class="post">
	                        <div class="news">
	                        	<img class="profpic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?type=square">';
	            echo 			'<span class="date pull-right">'.$key['date_added'].'</span>
	                            <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
	                            <span class="content comment more">
	                                <a href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"> '.$key['caption'].' </a>
	                                <br/>
	                                <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
	                                <span class="share pull-right approve-wikip"><button class="btn btn-danger btn-mini" onclick="approveWikip('.$key['wikip_id'].');"><i class="icon-white icon-remove"></i> Reject WikiP</button></span>
                                    <span class="share pull-right reject-wikip"><button class="btn btn-primary btn-mini" onclick=""><i class="icon-white icon-ok"></i> Approve WikiP</button></span>
	                            </span>

	                        </div>
	                    </div>';
            }
            else{
                echo    '<div class="post">
                            <div class="news">
                                <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?type=square">';
        		echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    '.$key['caption'].'<br/>
                                    <a href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"><img class="news-pic" src="'.$key['url'].'"></a>
                                    <br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                    <span class="share pull-right approve-wikip"><button class="btn btn-danger btn-mini" onclick="approveWikip('.$key['wikip_id'].');"><i class="icon-white icon-remove"></i> Reject WikiP</button></span>
                                    <span class="share pull-right reject-wikip"><button class="btn btn-primary btn-mini" onclick=""><i class="icon-white icon-ok"></i> Approve WikiP</button></span>
                                </span>
                            </div>
                        </div>';
            }
        }
     }
        echo '</div>';
}
?>