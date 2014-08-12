<!DOCTYPE html>
<!--[if IEMobile 7 ]>    <html class="no-js iem7"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js"> <!--<![endif]-->
<?php
    require_once 'global.php';
    require_once 'database.php';

    $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
    $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

    /*$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80")
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    else 
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    
    if($pageURL=='http://wikipangako.com/')
        header('Location: http://www.wikipangako.com/');*/

?>
<html>
    <head>
        <title>WikiPangako</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cleartype" content="on">

        <meta name="msapplication-TileImage" content="img/touch/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#222222">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">
        <link rel="shortcut icon" href="img/favicon.ico" />

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-fileupload.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        <link href="css/select2.css" rel="stylesheet" media="screen">
        <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-fileupload.min.js"></script>
        <script src="js/seemore.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
    
    <?php if( $iPod || $iPhone || $iPad || $Android || $webOS ){ ?>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <?php } ?>
    </head>
    <body>

    <?php
        if(isset($_SESSION['account_id']) && isset($_SESSION['normal_user'])){
            require_once 'views/nav_bar/nav_bar.php';
            require_once 'views/footer/footer.php';

            echo '<div class="mesh">';
            NavBar();
            echo '<div id="content-main" class="container">';

            require_once 'views/left_side_bar_facebook/left_side_bar_facebook.php';
            LeftSideBar_Facebook();

            if(isset($_GET['main'])){
                if($_GET['main']=='home'){
                    if(isset($_GET['inner'])){
                        switch ($_GET['inner']) {
                            case 'watchlist':
                                require_once 'views/watchlist/watchlist.php';
                                Watchlist();
                                break;
                            case 'network':
                                require_once 'views/network/network.php';
                                Network();
                                break;
                            case 'user_wikip':
                                require_once 'views/account_profile/account_profile.php';
                                AccountProfile($_GET['user_id']);
                                break;
                            case 'politicians':
                                require_once 'views/politicians/politicians.php';
                                Politicians();
                                break;
                            case 'politician-profile':
                                require_once 'views/politician_profile/politician_profile.php';
                                PoliticianProfile();
                                break;
                            case 'wikip_url':
                                require_once 'views/wikip_view/wikip_view.php';
                                WikipView($_GET['wikip_id']);
                                break;
                            case 'user_profile':
                                require_once 'views/account_profile/account_profile.php';
                                AccountProfile($_GET['user_id']);
                                break;
                        }
                    }
                    else{
                        require_once 'views/news_feed/news_feed.php';
                        NewsFeed();
                    }
                }
                else if($_GET['main']=='about'){
                    require_once 'views/under_construction/under_construction.php';
                    //About();
                    UnderConstruction();
                }
                else if($_GET['main']=='topstuff'){
                    require_once 'views/under_construction/under_construction.php';
                    //TopStuff();
                    UnderConstruction();
                }
                else if($_GET['main']=='report'){
                    require_once 'views/under_construction/under_construction.php';
                    //Report();
                    UnderConstruction();
                }
                else if($_GET['main']=='help'){
                    require_once 'views/under_construction/under_construction.php';
                    //Help();
                    UnderConstruction();
                }
            }
            else{
                require_once 'views/home/home.php';
                Home();
            }

            if(isset($_GET['logout'])){
                if($facebook->getUser())
                    $facebook->destroySession();
                session_unset();
                header('Location: '.HOSTNAME);
                exit;
            }


            echo '</div>
            </div>';

            Footer();
        }
        else { header('Location: '.HOSTNAME); exit; }
    ?>
        <script src="js/default.js"></script>

    <?php if( $iPod || $iPhone || $iPad || $Android || $webOS ){ ?>
        <script src="js/vendor/zepto.min.js"></script>
        <script src="js/helper.js"></script>
    <?php } ?>
    </body>
</html>