<?php
//
//  semi_lock.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 10/22/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function SemiLock($account_id, $politician_profile_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("INSERT INTO SEMI_LOCKS (account_id_fk, politician_profile_id_fk) VALUES(" . $account_id . ", " . $politician_profile_id . ")");
}

?>