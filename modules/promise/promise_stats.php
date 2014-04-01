<?php
function PromiseStats($politician_id){
    global $database;
    if($database==null)
        Connect();

    $data_array = array();
    $total = $database->query("SELECT COUNT(tracks_id) 'total' FROM TRACKS WHERE status!=0 
            AND promise_id_fk IN (SELECT promise_id FROM PROMISE WHERE politician_id_fk=".$politician_id.")");
    $finished = $database->query("SELECT COUNT(tracks_id) 'finished' FROM TRACKS WHERE status=1 
            AND promise_id_fk IN (SELECT promise_id FROM PROMISE WHERE politician_id_fk=".$politician_id.")");
    $inprogress = $database->query("SELECT COUNT(tracks_id) 'inprogress' FROM TRACKS WHERE status=2 
            AND promise_id_fk IN (SELECT promise_id FROM PROMISE WHERE politician_id_fk=".$politician_id.")");
    $failed = $database->query("SELECT COUNT(tracks_id) 'failed' FROM TRACKS WHERE status=4 
            AND promise_id_fk IN (SELECT promise_id FROM PROMISE WHERE politician_id_fk=".$politician_id.")");
    
    if(!empty($total) && !empty($finished) && !empty($inprogress) && !empty($failed)){
        $total = $total->fetch_assoc();
        $finished = $finished->fetch_assoc();
        $inprogress = $inprogress->fetch_assoc();
        $failed = $failed->fetch_assoc();

        if($total['total']!=0){
            $data_array['finished']=round((($finished['finished']*0.45)/($total['total']*0.45))*100);
            $data_array['inprogress']=round((($inprogress['inprogress']*0.45)/($total['total']*0.45))*100);
            $data_array['failed']=round((($failed['failed']*0.45)/($total['total']*0.45))*100);
        } else{
            $data_array['finished'] = 0;
            $data_array['inprogress'] = 0;
            $data_array['failed'] = 0;
        }
    }
    return $data_array;
}
?>
