<?php
function DeletePromise($promise_id){
    global $database;

    if($database==null)
        Connect();

    $database->query("DELETE FROM TRACKS WHERE promise_id_fk=".$promise_id);
    $database->query("DELETE FROM PROMISE WHERE promise_id=".$promise_id." AND account_id_fk=".$_SESSION['account_id']);
}
?>