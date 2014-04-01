<?php
//
//  setsession_moderator.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

require_once 'global.php';

if(isset($_SESSION['normal_user']))
    unset($_SESSION['normal_user']);

if(isset($_SESSION['politician']))
    unset($_SESSION['politician']);

$_SESSION['moderator'] = true;

header('Location: ' . HOSTNAME . 'moderator.php');
exit;

?>