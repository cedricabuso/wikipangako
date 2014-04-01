<?php
function State($state, $id){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE ACCOUNT SET privacy=".$state." WHERE account_id=".$id);
}
?>