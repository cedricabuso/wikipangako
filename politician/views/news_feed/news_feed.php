<?php
require_once 'global.php';
require_once 'politician/modules/answer/retrieve_questions.php';

function NewsFeed(){
    global $facebook;

    $data = RetrieveQuestions($_SESSION['politician_id']);

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
            echo    '<div id="'.$key['wikip_id'].'" class="post">
                        <div class="news">
                            <img class="profpic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?type=square">';
            echo            '<span class="date pull-right">'.$key['date_added'].'</span>
                            <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
                            <span class="content comment more">								
                                <p>'.$key['caption'].'</p>
								<form name="' . $key['wikip_id'] . '-answer" method="post" action="">
									<input type="text" name="answer_question" placeholder="Insert answer here..."/>
									<input type="hidden" name="wikip_id" value="'.$key['wikip_id'].'"/>
									<button name="submit" class="btn add-on">Submit</button>
								</form>
                                <br/>
                            </span>

                        </div>
                    </div>';
        }
		
		if($_POST['submit']){
			require_once 'politician/modules/answet/answer_question.php';
			AnswerQuestion($_POST['wikip_id'], $_POST['answer_question']);			
		}
     }
        echo '</div>';
}
?>