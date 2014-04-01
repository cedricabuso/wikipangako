<?php
function RetrieveTrendingWikips(){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT WIKIP.*, POLITICIAN.name FROM WIKIP, POLITICIAN WHERE WIKIP.is_question = 0 AND WIKIP.politician_id_fk = POLITICIAN.politician_id ORDER BY WIKIP.share_count+WIKIP.tweet_count DESC LIMIT 10");

    $data_array = array();
    if(!empty($result)) while ($row = $result->fetch_assoc()) array_push($data_array, $row);
    return $data_array;
}

?>