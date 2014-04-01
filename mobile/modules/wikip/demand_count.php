<?php
function DemandCount($wikip_id){
    global $database;
    if($database==null)
        Connect();
  
    $data_array = array();
  	$result = $database->query("SELECT COUNT(wikip_id_fk) 'demand' FROM DEMAND WHERE wikip_id_fk=".$wikip_id);
    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array, $row);
    else $data_array[0]['demand']=0;

    return json_encode($data_array);
}
?>