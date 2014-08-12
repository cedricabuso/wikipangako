<?php
function GetNotification($account_id){
    global $database;
    if($database==null)
        Connect();

	$result = $database->query("SELECT details, link FROM NOTIFICATION WHERE is_seen=1 AND account_id=".$account_id);

	$data_array = array();
	if(!empty($result))
		while ($row = $result->fetch_assoc()) array_push($data_array, $row);

    return $data_array;
}
?>