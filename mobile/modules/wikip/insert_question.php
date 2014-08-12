<?php
function InsertQuestion($caption, $politician_id, $account_id){
    global $database;
    if($database==null)
        Connect();

    $caption = EscapeData($caption);

    $database->query("INSERT INTO WIKIP (url, date_added, approved, caption, is_question, answer, share_count, politician_id_fk, account_id_fk) VALUES(null, NOW(), 1, \"". $caption ."\", 1, null, 0, " . $politician_id . ", ". $account_id .")");
}
?>