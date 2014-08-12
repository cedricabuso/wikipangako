<?php
function AccountState($id){
    global $database;
    if($database==null)
        Connect();

    $result = $database->query("SELECT privacy FROM ACCOUNT WHERE account_id=".$id);
    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);
                    
    return $data_array;
}
?>