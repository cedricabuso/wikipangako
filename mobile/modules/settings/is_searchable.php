<?php
function IsSearchable($id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT searchable FROM ACCOUNT WHERE account_id=".$id);
    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>