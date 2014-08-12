<?php
require_once 'database.php';

//
//  retrieve_questions.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function RetrieveProjects($politician_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM PROMISE WHERE pdaf = 1 AND politician_id_fk = " . $politician_id);

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}