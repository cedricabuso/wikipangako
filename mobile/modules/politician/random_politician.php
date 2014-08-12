<?php
function RandomPolitician(){
    global $database;
    if($database==null)
        Connect();
    $result = $database->query("SELECT politician_id, name, position, province, city FROM POLITICIAN ORDER BY RAND() LIMIT 3");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>