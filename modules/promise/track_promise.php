<?php
//
//  track_promise.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//


function TrackPromise($status, $account_id, $promise_id){
    global $database;
    if($database==null)
        Connect();

    if($account_id==$_SESSION['account_id']){
        $result = $database->query("SELECT * FROM TRACKS WHERE account_id_fk=".$account_id." AND promise_id_fk=".$promise_id."");
        if($result->num_rows>0)
            $database->query("UPDATE TRACKS SET status=".$status." WHERE account_id_fk=".$account_id." AND promise_id_fk=".$promise_id."");
        else
            $database->query("INSERT INTO TRACKS (status, account_id_fk, promise_id_fk) VALUES(". $status . ", " . $account_id . ", " . $promise_id . ")");

        $data_array = array();
        $data_array['done'] = array();
        $result = $database->query("SELECT COUNT(status) 'done' FROM TRACKS  WHERE status = 1 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['done'], $row);

        $data_array['inprogress'] = array();
        $result = $database->query("SELECT COUNT(status) 'inprogress' FROM TRACKS  WHERE status = 2 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['inprogress'], $row);

        $data_array['stalled'] = array();
        $result = $database->query("SELECT COUNT(status) 'stalled' FROM TRACKS  WHERE status = 3 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['stalled'], $row);

        $data_array['failed'] = array();
        $result = $database->query("SELECT COUNT(status) 'failed' FROM TRACKS  WHERE status = 4 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['failed'], $row);

        echo json_encode($data_array);
    }
}
?>
