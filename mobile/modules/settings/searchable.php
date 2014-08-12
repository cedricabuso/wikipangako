<?php
function Searchable($searchable, $id){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE ACCOUNT SET searchable=".$searchable." WHERE account_id=".$id);
}
?>