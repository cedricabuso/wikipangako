<?php
//
//  increase_points.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/18/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function GetPoints($account_id){
    global $database;

    if($database==null)
        Connect();

    if($account_id==$_SESSION['account_id'])
    	$result = $database->query("SELECT enforcer_points FROM ACCOUNT WHERE account_id=".$account_id);

    $data_array = array();
    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array[0]['enforcer_points'];
}
?>