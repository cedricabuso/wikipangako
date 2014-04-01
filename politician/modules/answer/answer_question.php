<?php
require_once 'database.php';

//
//  answer_question.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function AnswerQuestion($wikip_id, $answer){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE WIKIP SET answer = " . $answer . " WHERE wikip_id = " . $wikip_id);
}

?>