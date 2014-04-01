<?php
//
//  increment_share_count.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 11/9/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function IncrementShareCount($wikip_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE WIKIP WHERE wikip_id = " . $wikip_id . " SET share_count=share_count+1");
}

?>