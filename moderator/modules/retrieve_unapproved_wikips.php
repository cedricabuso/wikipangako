<?php
require_once 'database.php';

function RetrieveUnapprovedWikiPs(){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT WIKIP.*, ACCOUNT.facebook_id, ACCOUNT.account_id, POLITICIAN.name, POLITICIAN.politician_id FROM WIKIP, ACCOUNT, POLITICIAN, IS_WATCHING, IS_CONTACT
                                    WHERE WIKIP.account_id_fk = ACCOUNT.account_id
                                    AND WIKIP.politician_id_fk = POLITICIAN.politician_id
                                    AND WIKIP.approved = 0
                                    ORDER BY WIKIP.date_added DESC");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}
?>