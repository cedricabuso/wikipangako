<?php
function PrivateContact($account_id1, $account_id2){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM PRIVATE_CONTACT WHERE account_id=".$account_id1." AND requested_by=".$account_id2);
    if($result->num_rows==0)
		$database->query("INSERT INTO PRIVATE_CONTACT (account_id, requested_by) VALUES(". $account_id1 . ", " . $account_id2 . ")");
}
?>