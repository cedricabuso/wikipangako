<?php
//
//  increment_demand_question.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 10/6/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function IncrementDemandQuestion($wikip_id, $account_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM DEMAND WHERE account_id_fk=".$account_id." AND wikip_id_fk=".$wikip_id."");
    if($result->num_rows>0)
        $database->query("DELETE FROM DEMAND WHERE account_id_fk=".$account_id." AND wikip_id_fk=".$wikip_id."");
    else
        $database->query("INSERT INTO DEMAND (account_id_fk, wikip_id_fk) VALUES(".$account_id.", ".$wikip_id.")");
  
    $data_array = array();
  	$result = $database->query("SELECT COUNT(demand_id) 'demand' FROM DEMAND WHERE wikip_id_fk = ".$wikip_id);
    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array, $row);

    echo json_encode($data_array);
}
?>