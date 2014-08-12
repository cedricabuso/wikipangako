<?php
//
//  retrieve_promises.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/26/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function RetrievePromises($politician_id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM PROMISE WHERE politician_id_fk = " . $politician_id . " AND pdaf = 0");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return json_encode($data_array);
}
?>