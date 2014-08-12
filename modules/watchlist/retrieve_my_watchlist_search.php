<?php
function RetrieveMyWatchlistSearch($name, $account_id){
    global $database;
    if($database==null)
        Connect();

    if($account_id==$_SESSION['account_id']){
        if($name!=null)
            $result = $database->query("SELECT * FROM POLITICIAN
                                            WHERE name LIKE \"%{$name}%\"
                                            AND politician_id IN
                                                (SELECT politician_id_fk FROM IS_WATCHING WHERE account_id_fk = ".$account_id.")
                                        ");

        else
            $result = $database->query("SELECT * FROM POLITICIAN
                                            WHERE politician_id IN
                                                (SELECT politician_id_fk FROM IS_WATCHING WHERE account_id_fk = ".$account_id.")
                                        ");

        $data_array = array();
        if(!empty($result))
            while ($row = $result->fetch_assoc())
                array_push($data_array, $row);

        return $data_array;
    }
}
?>