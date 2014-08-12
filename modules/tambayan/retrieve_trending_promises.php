<?php
function RetrieveTrendingPromises(){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT PROMISE.*, POLITICIAN.name 'politician_name' FROM PROMISE, POLITICIAN WHERE POLITICIAN.politician_id=PROMISE.politician_id_fk ORDER BY PROMISE.share_count+PROMISE.tweet_count DESC LIMIT 10");

    $data_array = array();
    if(!empty($result)) while ($row = $result->fetch_assoc()) array_push($data_array, $row);
    return $data_array;
}

?>