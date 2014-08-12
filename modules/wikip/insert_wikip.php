<?php
function InsertWikiP($url, $caption, $politician_id, $account_id){
    global $database;
    if($database==null)
        Connect();

    $caption = EscapeData($caption);
    if($account_id==$_SESSION['account_id']){
        $database->query("INSERT INTO WIKIP (url, date_added, approved, caption, is_question, politician_id_fk, account_id_fk) 
        	VALUES(\"".$url."\", NOW(), 1, \"".$caption."\", 0, ".$politician_id.", ".$account_id.")");
        

        $database->query("INSERT INTO NOTIFICATION (details, link, account_id) 
            SELECT 
                CONCAT('<b>', ACCOUNT.name, '</b> posted a wikip about <b>', POLITICIAN.name, '</b>'), 
                CONCAT('http://www.wikipangako.com/?main=home&inner=wikip_url&wikip_id=', LAST_INSERT_ID()), 
                IS_WATCHING.account_id_fk 
            FROM ACCOUNT, POLITICIAN, IS_WATCHING 
            WHERE 
                ACCOUNT.account_id=".$account_id." 
                AND POLITICIAN.politician_id=".$politician_id." 
                AND IS_WATCHING.account_id_fk!=".$account_id." 
                AND IS_WATCHING.politician_id_fk=".$politician_id);
    }
}
?>