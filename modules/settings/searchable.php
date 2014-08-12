<?php
function Searchable($searchable, $id){
    global $database;
    if($database==null)
        Connect();

    if($id==$_SESSION['account_id'])
    	$database->query("UPDATE ACCOUNT SET searchable=".$searchable." WHERE account_id=".$id);
}
?>