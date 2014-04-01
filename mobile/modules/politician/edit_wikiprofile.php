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

    $database->query("INSERT INTO POLITICIAN_PROFILE(date_added, category, details, account_id_fk, politician_id_fk) VALUES(NOW(), '" . $category ."', \"" . $details ."\", " . $account_id .", " . $politician_id .")");

    //INSERT INTO POLITICIAN_PROFILE(date_added, category, details, account_id_fk, politician_id_fk) VALUES(NOW(), 'Education', 'University of the Philippines Los Baños', 1, 136);
}

?>