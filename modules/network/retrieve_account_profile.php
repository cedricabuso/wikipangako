<?php
function RetrieveAccountProfile($id){
    global $database;
    if($database==null)
        Connect();

    $data_array = array();
    $result = $database->query("SELECT * FROM ACCOUNT WHERE account_id = ".$id."");
    while ($row = $result->fetch_assoc()) array_push($data_array, $row);

    return $data_array;
}
?>