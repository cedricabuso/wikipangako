<?php
function AddContact($account_id1, $account_id2){
	require_once 'private_contact.php';
    require_once '../settings/account_state.php';

    global $database;
    if($database==null)
        Connect();

    if($account_id2==$_SESSION['account_id']){
        $account_state = AccountState($account_id1);
        $result = $database->query("SELECT * FROM PRIVATE_CONTACT WHERE account_id=".$account_id2." AND requested_by=".$account_id1);
        
        if($result->num_rows>0){
        	$database->query("INSERT INTO IS_CONTACT (account_id1_fk, account_id2_fk) VALUES(".$account_id2.", ".$account_id1.")");
        	$database->query("DELETE FROM PRIVATE_CONTACT WHERE account_id=".$account_id2." AND requested_by=".$account_id1);
        } else if($account_state[0]['privacy']=='0')
        	$database->query("INSERT INTO IS_CONTACT (account_id1_fk, account_id2_fk) VALUES(".$account_id1.", ".$account_id2.")");
        else
        	PrivateContact($account_id1, $account_id2);
    }

}
?>