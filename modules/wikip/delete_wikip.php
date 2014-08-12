<?php
function DeleteWikip($wikip_id){
    global $database;

    if($database==null)
        Connect();

    $database->query("DELETE FROM WIKIP WHERE wikip_id=".$wikip_id." AND account_id_fk=".$_SESSION['account_id']);
}
?>