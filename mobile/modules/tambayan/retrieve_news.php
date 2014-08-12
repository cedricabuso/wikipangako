<?php
//
//  retrieve_news.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 11/9/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function RetrieveNews(){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT WIKIP.*, POLITICIAN.name FROM WIKIP, POLITICIAN WHERE WIKIP.politician_id_fk = POLITICIAN.politician_id ORDER BY date_added DESC LIMIT 5");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}

?>