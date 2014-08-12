<?php
//
//  upload_promise.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/26/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function InsertPromise($politician_id, $name, $details, $sources, $category){
    global $database;
    if($database==null)
        Connect();
    $name = rawurldecode($name);
    $sources = rawurldecode($sources);
    $details = rawurldecode($details);
    $category = rawurldecode($category);

    $name = EscapeData($name);
    $details = EscapeData($details);
    $sources = EscapeData($sources);
    
    $database->query('INSERT INTO PROMISE (name, details, pdaf, approved, politician_id_fk, sources, category) 
    	VALUES ("'.$name.'", "'.$details.'", 0, 1, '.$politician_id.', "'.$sources.'", "'.$category.'")');

    $database->query("INSERT INTO NOTIFICATION (details, link, account_id) 
    	SELECT 
    		CONCAT('<b>', POLITICIAN.name, '</b> declared a new promise: <b>".$name."</b>'), 
    		CONCAT('http://www.wikipangako.com/?main=home&inner=promise_url&promise_id=', LAST_INSERT_ID()),
            IS_WATCHING.account_id_fk 
    	FROM POLITICIAN, IS_WATCHING 
            WHERE POLITICIAN.politician_id=".$politician_id."
            AND IS_WATCHING.account_id_fk!=".$_SESSION['account_id']." 
            AND IS_WATCHING.politician_id_fk=".$politician_id);
}

?>