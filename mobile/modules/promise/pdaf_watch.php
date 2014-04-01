<?php
function PdafWatch(){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT PROMISE.promise_id, PROMISE.name, PROMISE.details, PROMISE.pdaf, PROMISE.politician_id_fk, POLITICIAN.name 'politician_name' FROM PROMISE, POLITICIAN  
    							WHERE PROMISE.pdaf=0 AND POLITICIAN.politician_id=PROMISE.politician_id_fk ORDER BY RAND() LIMIT 3");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}

?>