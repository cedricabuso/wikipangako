<?php
function RetrieveContactCount($account_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT DISTINCT account_id1_fk FROM IS_CONTACT WHERE account_id2_fk=".$account_id);
    $result2 = $database->query("SELECT DISTINCT account_id2_fk FROM IS_CONTACT WHERE account_id1_fk=".$account_id);
    if($result)
        return $result->num_rows+$result2->num_rows;

    return 0;
}
?>