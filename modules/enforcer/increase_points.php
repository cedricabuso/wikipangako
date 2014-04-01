<?php
//
//  increase_points.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/18/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function increase_points($account_id, $points){
    global $database;

    if($database==null)
        Connect();

    $database->query("UPDATE ACCOUNT SET enforcer_points = enforcer_points + " . $points . " WHERE account_id = " . $account_id);
}
?>