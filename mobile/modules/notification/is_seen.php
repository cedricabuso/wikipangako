<?php
function IsSeen($account_id){
    global $database;
    if($database==null)
        Connect();

	$database->query("DELETE FROM NOTIFICATION WHERE account_id=".$account_id);
}
?>