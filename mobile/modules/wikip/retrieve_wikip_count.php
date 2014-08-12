<?php
function RetrieveWikiPCount($account_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT wikip_id FROM WIKIP
                                    WHERE account_id_fk = ".$account_id);
    if(empty($result))
        return 0;

    return $result->num_rows;
}
?>