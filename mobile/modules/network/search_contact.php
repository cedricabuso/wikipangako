<?php
function SearchContact($name){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM ACCOUNT WHERE name LIKE '% " . $name . "%' OR name LIKE '" . $name . "%' OR name LIKE '% " . $name . "'");
    
    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>