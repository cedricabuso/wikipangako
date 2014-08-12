<?php
function RetrieveOneWikiP($wikip_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT WIKIP.*, ACCOUNT.facebook_id, POLITICIAN.name, POLITICIAN.politician_id FROM WIKIP, ACCOUNT, POLITICIAN
                                WHERE WIKIP.account_id_fk = ACCOUNT.account_id
                                AND WIKIP.politician_id_fk = POLITICIAN.politician_id
                                AND WIKIP.wikip_id = " . $wikip_id);

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
?>