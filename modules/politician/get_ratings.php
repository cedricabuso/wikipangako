<?php
function GetRatings($account_id, $politician_id){
    global $database;
    if($database==null)
        Connect();

    $data_array = array();
    $data_array['like'] = array();
    $result = $database->query("SELECT COUNT(rating) 'like' FROM RATES WHERE rating = 1 AND politician_id_fk=".$politician_id."");

    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array['like'], $row);

    $data_array['hate'] = array();
    $result = $database->query("SELECT COUNT(rating) 'hate' FROM RATES WHERE rating = 0 AND politician_id_fk=".$politician_id."");

    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array['hate'], $row);

    $data_array['user_rating'] = array();
    $result = $database->query("SELECT rating FROM RATES WHERE account_id_fk=".$account_id." AND politician_id_fk=".$politician_id."");

    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array['user_rating'], $row);

    return $data_array;
}
?>