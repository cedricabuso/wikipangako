<?php
function RetrieveWikiPCount($account_id){
    global $database;
    if($database==null)
        Connect();
    if($account_id==$_SESSION['account_id'])
    	$result = $database->query("SELECT wikip_id FROM WIKIP WHERE account_id_fk = ".$account_id);
    if(empty($result))
        return 0;

    return $result->num_rows;
}
?>