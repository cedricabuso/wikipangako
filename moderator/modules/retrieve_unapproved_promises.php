<?php
require_once 'database.php';
//
//  retrieve_unapproved_promises.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/26/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function RetrieveUnapprovedPromises(){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT PROMISE.*, POLITICIAN.name, POLITICIAN.politician_id FROM PROMISE, POLITICIAN
                                    WHERE PROMISE.politician_id_fk = POLITICIAN.politician_id
                                    AND PROMISE.approved = 0
                                    AND PROMISE.pdaf = 0");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}
?>