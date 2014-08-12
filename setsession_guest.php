<?php
    require_once 'global.php';

    $_SESSION['guest'] = true;
    header('Location: '.HOSTNAME);
?>