<?php
//
//  setsession_politician.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

require_once 'global.php';

if(isset($_SESSION['normal_user']))
    unset($_SESSION['normal_user']);

if(isset($_SESSION['moderator']))
    unset($_SESSION['moderator']);

$_SESSION['politician'] = true;

require_once 'politician/modules/profile/get_politician_id.php';

$_SESSION['politician_id'] = GetPoliticianId($_SESSION['account_id']);

header('Location: ' . HOSTNAME . 'politician.php');
exit;

?>