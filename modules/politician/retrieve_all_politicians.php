<?php
function RetrieveAllPoliticians(){
    global $database;
    if($database==null)
        Connect();

        $result = $database->query("SELECT politician_id 'id', CONCAT(name, ' - ', position) 'text' FROM POLITICIAN");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>