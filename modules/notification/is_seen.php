<?php
function IsSeen($account_id){
    global $database;
    if($database==null)
        Connect();

	if($account_id==$_SESSION['account_id'])
		$database->query("DELETE FROM NOTIFICATION WHERE account_id=".$account_id);
}
?>