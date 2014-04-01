<?php
function ContactRequest($account_id){
    global $database;
    if($database==null)
        Connect();

	$result = $database->query("SELECT a.account_id, a.name FROM ACCOUNT a, PRIVATE_CONTACT b WHERE a.account_id=b.requested_by AND b.account_id=".$account_id);

	$data_array = array();
	while ($row = $result->fetch_assoc()) array_push($data_array, $row);

    return json_encode($data_array);
}
?>