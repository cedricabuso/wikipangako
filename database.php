<?php
//
//  database.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 8/19/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

$database = null;
function Connect(){
    global $database;

    //$services_json = json_decode(getenv("VCAP_SERVICES"),true);
    //$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
    //$username = $mysql_config["username"];
    //$password = $mysql_config["password"];
    //$hostname = $mysql_config["hostname"];
    //$port = $mysql_config["port"];
    //$db = $mysql_config["name"];

    
    $hostname = "mysql.hostinger.ph";
    $username = "u828907785_wikip";
    $password = "aZ5gWIwNz8DCCX7e0t";
    $db = "u828907785_wikip";

    //$hostname = "localhost";
    //$username = "root";
    //$password = "";
    //$db = "wikipangako";

    //$link = mysql_connect("$hostname:$port", $username, $password);
    $database = new mysqli($hostname, $username, $password, $db);
}

function GetRoles($account_id){
    global $database;

    if($database==null)
        Connect();

    $result = $database->query("SELECT * FROM ROLE WHERE account_id_fk = " . $account_id);

    $data_array = array();

    if(!empty($result))
        while ($row = $result->fetch_assoc())
            array_push($data_array, $row);

    return $data_array;
}

function EscapeData($data){
    $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
    ); 
    $data = preg_replace($search, '', $data);
    $data = htmlspecialchars($data, ENT_QUOTES);

    return $data;
}
?>