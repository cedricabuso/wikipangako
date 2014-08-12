<?php
//
//  retrieve_trending_questions.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 11/9/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function RetrieveTrendingQuestions(){
    global $database;
    if($database==null)
        Connect();


    $result = $database->query("SELECT WIKIP.*, POLITICIAN.name FROM WIKIP, POLITICIAN WHERE WIKIP.is_question = 1 AND WIKIP.politician_id_fk = POLITICIAN.politician_id ORDER BY share_count+tweet_count DESC LIMIT 10");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}

?>