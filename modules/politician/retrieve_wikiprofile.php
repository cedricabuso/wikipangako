<?php
//
//  retrieve_wikiprofile.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 10/22/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function RetrieveWikiProfile($politician_id, $category){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT POLITICIAN_PROFILE.*, ACCOUNT.name FROM POLITICIAN_PROFILE, ACCOUNT WHERE POLITICIAN_PROFILE.politician_id_fk = " . $politician_id . " and POLITICIAN_PROFILE.category = '" . $category . "' and POLITICIAN_PROFILE.account_id_fk = ACCOUNT.account_id ORDER BY date_added DESC LIMIT 1");

    //SELECT POLITICIAN_PROFILE.*, ACCOUNT.name FROM POLITICIAN_PROFILE, ACCOUNT WHERE POLITICIAN_PROFILE.politician_id_fk = 136 and POLITICIAN_PROFILE.category = 'Education' and ACCOUNT.account_id = POLITICIAN_PROFILE.account_id_fk ORDER BY date_added LIMIT 1

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}
?>