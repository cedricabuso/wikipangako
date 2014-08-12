<?php
//
//  retrieve_questions_answers.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function RetrieveQuestionsAnswers($politician_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM WIKIP WHERE is_question = 1 AND answer IS NOT NULL AND politician_id_fk = " . $politician_id);

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);}