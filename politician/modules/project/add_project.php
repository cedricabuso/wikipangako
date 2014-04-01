<?php
require_once 'database.php';

//
//  add_project.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

function AddProject($title, $details, $politician_id){
    global $database;
    if($database==null)
        Connect();

    $database->query("INSERT INTO PROMISE (name, details, pdaf, approved, votes, sources, politician_id_fk) VALUES ('" . $title . "', '" . $details . "', 1, 0, 0, null, " . $politician_id . ")");
}

?>