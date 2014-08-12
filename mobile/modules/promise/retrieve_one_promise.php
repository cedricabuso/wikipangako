<?php
//
//  retrieve_one_promise.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 11/6/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function RetrieveOnePromise($promise_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT PROMISE.*, POLITICIAN.name 'politician_name' FROM PROMISE, POLITICIAN
    							WHERE PROMISE.pdaf=0 AND PROMISE.promise_id = " . $promise_id . "
    							AND PROMISE.politician_id_fk = POLITICIAN.politician_id");


    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}

?>