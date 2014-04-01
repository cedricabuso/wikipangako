<?php
function RetrieveMyWatchlist($account_id){
    global $database;
    if($database==null)
        Connect();


    $result = $database->query("SELECT * FROM POLITICIAN
                                    WHERE politician_id IN
                                        (SELECT politician_id_fk FROM IS_WATCHING WHERE account_id_fk = ".$account_id.")
                                    LIMIT 10
                                ");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>