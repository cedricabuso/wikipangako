<?php
function RetrieveMyContacts($name, $account_id){

    global $database;
    if($database==null)
        Connect();

    if($account_id==$_SESSION['account_id']){
        $result = $database->query("SELECT * FROM ACCOUNT WHERE
            (name LIKE \"%{$name}%\" AND searchable=1 AND  account_id != ".$account_id." AND account_id IN (SELECT account_id1_fk FROM IS_CONTACT WHERE account_id2_fk = ".$account_id."))
            OR (name LIKE \"%{$name}%\" AND searchable=1 AND account_id != ".$account_id." AND account_id IN (SELECT account_id2_fk FROM IS_CONTACT WHERE account_id1_fk = ".$account_id."))
            LIMIT 10");

        $data_array = array();

        if(!empty($result))
            while ($row = $result->fetch_assoc())
                array_push($data_array, $row);

        return $data_array;
    }
}
?>