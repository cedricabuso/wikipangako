<?php
function compare_date($a, $b){
    return strnatcmp($b['date_added'], $a['date_added']);
}

function GetPromises($account_id){
    global $database;
    if($database==null)
        Connect();

    if($account_id==$_SESSION['account_id']){
        $result = $database->query("SELECT PROMISE.*, POLITICIAN.name 'politician_name', ACCOUNT.name 'account_name', ACCOUNT.facebook_id FROM PROMISE, IS_WATCHING, POLITICIAN, ACCOUNT 
        							WHERE PROMISE.pdaf=0
        							AND (PROMISE.politician_id_fk=IS_WATCHING.politician_id_fk AND IS_WATCHING.account_id_fk=".$account_id.")
        							AND PROMISE.politician_id_fk = POLITICIAN.politician_id
                                    AND ACCOUNT.account_id=PROMISE.account_id_fk ORDER BY RAND() LIMIT 30");

        $data_array = array();
        if(!empty($result)) while ($row = $result->fetch_assoc()) array_push($data_array, $row);
        usort($data_array, 'compare_date');
        return $data_array;
    }
}
?>