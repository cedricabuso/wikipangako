<?php
//
//  edit_wikiprofile.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 10/22/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function EditWikiProfile($politician_id, $account_id, $category, $details){
    global $database;
    if($database==null)
        Connect();

    $details = EscapeData($details);
    if($account_id==$_SESSION['account_id'])
    	$database->query("INSERT INTO POLITICIAN_PROFILE(date_added, category, details, account_id_fk, politician_id_fk) VALUES(NOW(), '" . $category ."', \"" . $details ."\", " . $account_id .", " . $politician_id .")");

    $database->query("INSERT INTO NOTIFICATION (details, link, account_id) 
            SELECT 
                CONCAT('<b>', ACCOUNT.name, '</b> edited <b>', POLITICIAN.name, '</b> profile.'), 
                'http://www.wikipangako.com/?main=home&inner=politician-profile&id=".$politician_id."', 
                IS_WATCHING.account_id_fk 
            FROM ACCOUNT, POLITICIAN, IS_WATCHING 
            WHERE 
                ACCOUNT.account_id=".$account_id." 
                AND POLITICIAN.politician_id=".$politician_id." 
                AND IS_WATCHING.account_id_fk!=".$account_id." 
                AND IS_WATCHING.politician_id_fk=".$politician_id);
}

?>