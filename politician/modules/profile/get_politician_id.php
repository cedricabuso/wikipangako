<?php
//
//  get_politician_id.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/17/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

require_once 'database.php';

function GetPoliticianId($account_id){
    global $database;

    if($database==null)
        Connect();

    $result = $database->query("SELECT politician_id_fk FROM ROLE WHERE account_id_fk = " . $account_id . " AND politician_id_fk IS NOT NULL");
    $key = $result->fetch_assoc();

    return $key['politician_id_fk'];
}