<?php
function PromiseCount($account_id, $promise_id){
    global $database;
    if($database==null)
        Connect();

    if($account_id==$_SESSION['account_id']){
        $data_array = array();
        $data_array['done'] = array();
        $result = $database->query("SELECT COUNT(status) 'done' FROM TRACKS WHERE status = 1 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['done'], $row);

        $data_array['inprogress'] = array();
        $result = $database->query("SELECT COUNT(status) 'inprogress' FROM TRACKS WHERE status = 2 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['inprogress'], $row);

        $data_array['stalled'] = array();
        $result = $database->query("SELECT COUNT(status) 'stalled' FROM TRACKS WHERE status = 3 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['stalled'], $row);

        $data_array['failed'] = array();
        $result = $database->query("SELECT COUNT(status) 'failed' FROM TRACKS WHERE status = 4 AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['failed'], $row);

        $data_array['is_selected'] = array();
        $result = $database->query("SELECT status FROM TRACKS WHERE account_id_fk=".$account_id." AND promise_id_fk=".$promise_id."");
        if(!empty($result))
            while ($row = $result->fetch_assoc()) array_push($data_array['is_selected'], $row);

        return $data_array;
    }
}
?>
