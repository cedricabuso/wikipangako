<?php
//
//  insert_wikipork.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function InsertWikiPork($url, $caption, $politician_id, $account_id, $promise_id){
    global $database;
    if($database==null)
        Connect();

    $caption = EscapeData($caption);

    $database->query("INSERT INTO WIKIP (url, date_added, approved, caption, is_question, answer, share_count, politician_id_fk, account_id_fk, promise_id_fk) VALUES('" . $url . "', NOW(), 1, '". $caption ."', 0, null, 0, " . $politician_id . ", ". $account_id .", ". $promise_id .")");
}
?>