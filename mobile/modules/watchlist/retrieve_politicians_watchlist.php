<?php
function RetrievePoliticiansWatchlist($name, $account_id){
    global $database;
    if($database==null)
        Connect();


    if($name!=null)
        $result = $database->query("SELECT * FROM POLITICIAN
                                        WHERE name LIKE \"%{$name}%\"
                                        AND politician_id NOT IN
                                            (SELECT politician_id_fk FROM IS_WATCHING WHERE account_id_fk = ".$account_id.")
                                    ");

    else
        $result = $database->query("SELECT * FROM POLITICIAN
                                        WHERE politician_id NOT IN
                                            (SELECT politician_id_fk FROM IS_WATCHING WHERE account_id_fk = ".$account_id.")
                                    ");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>