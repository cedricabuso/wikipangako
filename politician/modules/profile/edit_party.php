<?php
require_once 'database.php';
//
//  edit_party.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function EditParty($politician_id, $password, $party){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT politician_id from POLITICIAN WHERE password = md5(" . $password . ")");
    if(!empty($result)){
        $database->query("UPDATE POLITICIAN SET political_party = " . $party . " WHERE politician_id = " .$politician_id);
    }
}
?>