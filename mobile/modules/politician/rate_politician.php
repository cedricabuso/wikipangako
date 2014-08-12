<?php
function RatePolitician($rating, $account_id, $politician_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM RATES WHERE account_id_fk=".$account_id." AND politician_id_fk=".$politician_id."");
    if($result->num_rows>0)
        $database->query("UPDATE RATES SET rating=".$rating." WHERE account_id_fk=".$account_id." AND politician_id_fk=".$politician_id."");
    else
        $database->query("INSERT INTO RATES (rating, account_id_fk, politician_id_fk) VALUES(". $rating . ", " . $account_id . ", " . $politician_id . ")");

    $data_array = array();
    $data_array['like'] = array();
    $result = $database->query("SELECT COUNT(rating) 'like' FROM RATES WHERE rating = 1 AND politician_id_fk=".$politician_id."");
    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array['like'], $row);

    $data_array['hate'] = array();
    $result = $database->query("SELECT COUNT(rating) 'hate' FROM RATES WHERE rating = 0 AND politician_id_fk=".$politician_id."");
    if(!empty($result))
        while ($row = $result->fetch_assoc()) array_push($data_array['hate'], $row);

    echo json_encode($data_array);
}
?>