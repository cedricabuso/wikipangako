<?php
function AddWatchlist($account_id1, $account_id2){
    global $database;
    if($database==null)
        Connect();

    $database->query("INSERT INTO IS_WATCHING (account_id_fk, politician_id_fk) VALUES(". $account_id1 . ", " . $account_id2 . ")");
}
?>