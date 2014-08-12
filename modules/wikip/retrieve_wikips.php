<?php
function RetrieveWikiPs($last_timestamp, $account_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT DISTINCT WIKIP.*, ACCOUNT.facebook_id, ACCOUNT.account_id, ACCOUNT.name 'account_name', POLITICIAN.name, POLITICIAN.politician_id FROM WIKIP, ACCOUNT, POLITICIAN, IS_WATCHING, IS_CONTACT
                                    WHERE WIKIP.account_id_fk = ACCOUNT.account_id
                                    AND WIKIP.politician_id_fk = POLITICIAN.politician_id
                                    AND WIKIP.approved = 1
                                    AND WIKIP.is_question=0
                                    AND ((WIKIP.politician_id_fk = IS_WATCHING.politician_id_fk
                                    AND IS_WATCHING.account_id_fk = " . $account_id. ")
                                    OR (WIKIP.account_id_fk = IS_CONTACT.account_id1_fk OR WIKIP.account_id_fk = IS_CONTACT.account_id2_fk)
                                    AND (IS_CONTACT.account_id1_fk = " . $account_id. " OR IS_CONTACT.account_id2_fk = " . $account_id. "))
                                    ORDER BY WIKIP.date_added DESC LIMIT 20");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}
?>