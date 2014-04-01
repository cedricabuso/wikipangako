<?php
function SearchTerm($term){
    global $database;
    if($database==null)
        Connect();

    if($term!=null){
        $term = strtolower($term);

        if(substr($term, -1)=='s'){
            $term = substr($term, 0, -1);
            $result = $database->query("SELECT politician_id, name, position, province, city FROM POLITICIAN WHERE position LIKE \"%$term%\"");
        } else if($term=='congressmen')
            $result = $database->query("SELECT politician_id, name, position, province, city FROM POLITICIAN WHERE position LIKE \"%congressman%\"");
        else if($term!='')    
            $result = $database->query("SELECT politician_id, name, position, province, city FROM POLITICIAN WHERE
                                    position LIKE \"%{$term}%\" OR
                                    city LIKE \"%{$term}%\" OR
                                    province LIKE \"%{$term}%\" OR
                                    name LIKE \"%{$term}%\"");

        $result2 = $database->query("SELECT account_id, name, facebook_id FROM ACCOUNT WHERE name LIKE \"%{$term}%\" AND account_id != ".$_SESSION['account_id']." AND searchable=1");
        
        $result3 = $database->query("SELECT WIKIP.wikip_id, WIKIP.caption, WIKIP.account_id_fk, ACCOUNT.facebook_id, ACCOUNT.name, ACCOUNT.facebook_id 
                                    FROM WIKIP, ACCOUNT, POLITICIAN 
                                    WHERE WIKIP.caption LIKE \"%{$term}%\" 
                                    AND POLITICIAN.politician_id = WIKIP.politician_id_fk
                                    AND WIKIP.account_id_fk = ACCOUNT.account_id");

        $result4 = $database->query("SELECT PROMISE.promise_id, PROMISE.name, PROMISE.details, PROMISE.politician_id_fk, POLITICIAN.name 'politician_name' 
                                    FROM PROMISE, POLITICIAN 
                                    WHERE (PROMISE.name LIKE \"%{$term}%\" OR PROMISE.details LIKE \"%{$term}%\")
                                    AND PROMISE.politician_id_fk=POLITICIAN.politician_id");
    }
    
    $data_array = array();
    $data_array['politician'] = array();
    $data_array['network'] = array();
    $data_array['wikips'] = array();
    $data_array['promises'] = array();
    if(!empty($result)) while ($row = $result->fetch_assoc()) array_push($data_array['politician'], $row);
    if(!empty($result2)) while ($row = $result2->fetch_assoc()) array_push($data_array['network'], $row);
    if(!empty($result3)) while ($row = $result3->fetch_assoc()) array_push($data_array['wikips'], $row);
    if(!empty($result4)) while ($row = $result4->fetch_assoc()) array_push($data_array['promises'], $row);
    return $data_array;
}
?>