<?php
function IsWatchlist($politician_id, $account_id){
    global $database;
    if($database==null)
        Connect();


    $result = $database->query("SELECT politician_id_fk FROM IS_WATCHING WHERE account_id_fk = ".$account_id." AND politician_id_fk=".$politician_id);

    $data_array = array();

    if(!empty($result) && $result->num_rows!=0)
        $data_array['is_watchlist']=true;
    else 
        $data_array['is_watchlist']=false;

    return json_encode($data_array);
}
?>