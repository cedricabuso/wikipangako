<?php
require_once '../database.php';
//
//  approve_wikip.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function ApproveWikiP($wikip_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE WIKIP SET approved = 1 WHERE wikip_id = " . $wikip_id);
}

function DisapproveWikiP($wikip_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("DELETE FROM WIKIP WHERE wikip_id = " . $wikip_id);
}
?>

?>