<?php
if(isset($_POST['action'])){
    $action = $_POST['action'];

    switch ($action) {
        case 'approve':
            require_once 'approve_wikip.php';

            $wikip_id = $_POST['wikip_id'];

            ApproveWikiP($wikip_id);
            break;
    }
}
?>