<?php
function IsContact($session_id, $account_id){

    global $database;
    if($database==null)
        Connect();

    if($session_id==$_SESSION['account_id']){
        $result = $database->query("SELECT account_id1_fk FROM IS_CONTACT 
                                        WHERE (account_id2_fk=".$account_id." AND account_id1_fk=".$session_id.")
                                        OR
                                        (account_id1_fk=".$account_id." AND account_id2_fk=".$session_id.")
                                ");
        $data_array = array();

        if(!empty($result) && $result->num_rows!=0)
            $data_array['is_contact']=true;
        else 
            $data_array['is_contact']=false;

        return $data_array;
    }
}
?>