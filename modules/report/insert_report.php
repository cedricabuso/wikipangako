<?php
function InsertReport($category, $details, $photo_url){
    global $database;
    if($database==null)
        Connect();

    $details = EscapeData($details);

    $database->query('INSERT INTO REPORTS (details, category, photo_url) VALUES ("'.$details.'", "'.$category.'", "'.$photo_url.'")');
}

?>