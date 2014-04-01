<?php
function GetPromises($account_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT PROMISE.*, POLITICIAN.name 'politician_name' FROM PROMISE, IS_WATCHING, POLITICIAN 
    							WHERE PROMISE.pdaf=0
    							AND (PROMISE.politician_id_fk=IS_WATCHING.politician_id_fk AND IS_WATCHING.account_id_fk=".$account_id.")
    							AND PROMISE.politician_id_fk = POLITICIAN.politician_id");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>