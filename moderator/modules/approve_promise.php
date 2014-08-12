<?php
require_once '../database.php';
//
//  approve_promise.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/26/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function ApprovePromise($promise_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE PROMISE SET approved = 1 WHERE promise_id = " . $promise_id);
}

function DisapprovePromise($promise_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("DELETE FROM PROMISE WHERE promise_id = " . $promise_id);
}

?>