<?php
function IsDemanded($wikip_id, $account_id){

    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT demand_id FROM DEMAND WHERE account_id_fk=".$account_id." AND wikip_id_fk=".$wikip_id);
    $data_array = array();

    if(!empty($result) && $result->num_rows!=0)
        $data_array['is_demanded']=true;
    else 
        $data_array['is_demanded']=false;

    return json_encode($data_array);
}
?>