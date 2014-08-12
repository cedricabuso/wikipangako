<?php
require_once 'global.php';
require_once 'database.php';

global $facebook;

if($facebook->getUser())
    $facebook->destroySession();
session_unset();
header('Location: http://www.wikipangako.com/');

?>