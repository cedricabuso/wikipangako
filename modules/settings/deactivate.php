<?php
function Deactivate(){

	if(isset($_SESSION['account_id'])){
		global $facebook;
	    global $database;

		if($facebook->getUser()) $facebook->destroySession();
	    if($database==null) Connect();

	    $database->query("UPDATE ACCOUNT SET privacy=1, searchable=0 WHERE account_id=".$_SESSION['account_id']);
	    $database->query("DELETE FROM DEMAND WHERE account_id_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM IS_CONTACT WHERE account_id1_fk=".$_SESSION['account_id']." OR account_id2_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM IS_WATCHING WHERE account_id_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM NOTIFICATION WHERE account_id=".$_SESSION['account_id']);
	    $database->query("DELETE FROM PRIVATE_CONTACT WHERE account_id=".$_SESSION['account_id']." OR requested_by=".$_SESSION['account_id']);
	    $database->query("DELETE FROM PROMISE WHERE account_id_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM RATES WHERE account_id_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM ROLES WHERE account_id_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM TRACKS WHERE account_id_fk=".$_SESSION['account_id']);
	    $database->query("DELETE FROM WIKIP WHERE account_id_fk=".$_SESSION['account_id']);

	    session_unset();
		header('Location: http://www.wikipangako.com/');
	}
}
?>