<?php
function State($state, $id){
    global $database;
    if($database==null)
        Connect();

    if($id==$_SESSION['account_id'])
    	$database->query("UPDATE ACCOUNT SET privacy=".$state." WHERE account_id=".$id);
}
?>