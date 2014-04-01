<?php
//
//  global.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 8/19/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
require_once 'lib/facebook/facebook.php';
require_once 'lib/twitter/twitteroauth.php';

$facebook = new Facebook(array(
    'appId'  => '516429741767185',
    'secret' => '541b9be5ba731855aea2c1852e75ee8b',
    'fileUpload' => true
));

//DEFINE('HOSTNAME', 'http://www.wikipangako.com/');
DEFINE('HOSTNAME', 'http://wikipangako.com.dev/wikipangako/');
?>