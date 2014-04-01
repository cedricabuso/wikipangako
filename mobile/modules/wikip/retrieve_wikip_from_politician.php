<?php
function RetrieveWikiPFromPolitician($politician_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT WIKIP.*, ACCOUNT.facebook_id, ACCOUNT.account_id, ACCOUNT.name 'account_name', POLITICIAN.name, POLITICIAN.politician_id FROM WIKIP, ACCOUNT, POLITICIAN
                                WHERE WIKIP.account_id_fk = ACCOUNT.account_id
                                AND WIKIP.is_question=0
                                AND WIKIP.politician_id_fk = POLITICIAN.politician_id
                                AND WIKIP.politician_id_fk = " . $politician_id . "
                                AND WIKIP.approved = 1
                                ORDER BY WIKIP.date_added DESC");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>