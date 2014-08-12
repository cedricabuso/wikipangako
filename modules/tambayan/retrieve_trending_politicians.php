<?php
function RetrieveTrendingPoliticians(){
    global $database;
    if($database==null)
        Connect();


    $result = $database->query("SELECT politician_id, name, position, province, city FROM POLITICIAN ORDER BY views+share_count+tweet_count DESC LIMIT 10");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}

?>