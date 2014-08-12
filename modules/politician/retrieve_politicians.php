<?php
function RetrievePoliticians($term){
    global $database;
    if($database==null)
        Connect();

    $term = strtolower($term);

    if(substr($term, -1)=='s'){
        $term = substr($term, 0, -1);
        $result = $database->query("SELECT * FROM POLITICIAN WHERE position LIKE \"%$term%\"");
    } else if($term=='congressmen')
        $result = $database->query("SELECT * FROM POLITICIAN WHERE position LIKE \"%congressman%\"");
    else if($term!='')    
        $result = $database->query("SELECT * FROM POLITICIAN WHERE
                                position LIKE \"%{$term}%\" OR
                                city LIKE \"%{$term}%\" OR
                                province LIKE \"%{$term}%\" OR
                                name LIKE \"%{$term}%\"");

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}
?>