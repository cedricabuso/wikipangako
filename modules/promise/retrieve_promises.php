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

    $result = $database->query("SELECT PROMISE.*, POLITICIAN.name 'politician_name' FROM PROMISE, POLITICIAN  
    						WHERE PROMISE.politician_id_fk=".$politician_id."
    						AND POLITICIAN.politician_id=".$politician_id." 
                            ORDER BY PROMISE.share_count+PROMISE.tweet_count+(SELECT COUNT(tracks_id) FROM TRACKS WHERE PROMISE.promise_id=TRACKS.promise_id_fk) DESC");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}
?>