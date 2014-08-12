<?php
function RetrievePoliticianProfile($id){
    global $database;
    if($database==null)
        Connect();

    $database->query("UPDATE POLITICIAN SET views=views+1 WHERE politician_id=".$id);
    $result = $database->query("SELECT * FROM POLITICIAN WHERE politician_id = ".$id);

    return json_encode($result->fetch_assoc());
}
?>