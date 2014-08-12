<!DOCTYPE html>
<?php
    require_once 'global.php';
    require_once 'database.php';

    $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    if ($_SERVER["SERVER_PORT"] != "80")
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    else 
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    
    //if($pageURL=='http://wikipangako.com/')
    //    header('Location: http://www.wikipangako.com/');

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
        <meta name='viewport' content='width=1190'>
        
        <link href="img/favicon.ico" rel="shortcut icon" />
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-fileupload.min.css" rel="stylesheet" media="screen">
        <link href="css/style.min.css" rel="stylesheet" media="screen">
        <link href="css/select2.min.css" rel="stylesheet" media="screen">

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-fileupload.min.js"></script>
        <script src="js/seemore.js"></script>
        <script src="js/select2.min.js"></script>
    </head>
    <body>
        <?php
        if(isset($_GET['read_only'])){
            require_once 'views/nav_bar/nav_bar.php';
            require_once 'views/footer/footer.php';
            echo '<div class="mesh">';
            NavBar();
            echo '<div id="content-main" class="container">';

            require_once 'views/left_side_bar_guest/left_side_bar_guest.php';
            LeftSideBar_guest();

            if(isset($_GET['wikip_id'])){
                require_once 'views/wikip_view/wikip_view.php';            
                WikipView($_GET['wikip_id']);
            } else if(isset($_GET['promise_id'])){
                require_once 'views/promise_view/promise_view.php';
                PromiseView($_GET['promise_id']);
            } else if(isset($_GET['main']) && $_GET['main']=='articles'){
                require_once 'views/articles/articles.php';
                Articles();
            }
            echo '</div>';
            echo '</div>';
            Footer();
            echo '
                <script src="js/default.min.js"></script>
                <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=516429741767185";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, \'script\', \'facebook-jssdk\'));</script>
                <script type="text/javascript"> if(top.location!= self.location) top.location=self.location </script>';
        }
        else{
            if(isset($_SESSION['account_id']) && $facebook->getUser() || isset($_SESSION['guest'])){
                require_once 'views/nav_bar/nav_bar.php';
                require_once 'views/footer/footer.php';

            echo    '<div class="mesh">';
                        NavBar();
                    echo '<div id="content-main" class="container">';

                    if(isset($_SESSION['guest'])){
                        require_once 'views/left_side_bar_guest/left_side_bar_guest.php';
                        LeftSideBar_guest();

                        if(isset($_GET['main']) && ($_GET['main']=='home' || $_GET['main']=='about' || $_GET['main']=='articles' || $_GET['main']=='contactus' || $_GET['main']=='ourteam' || $_GET['main']=='ourpartners' || $_GET['main']=='search' || $_GET['main']=='report')) {
                            if($_GET['main']=='home'){
                                if(isset($_GET['inner']) && ($_GET['inner']=='politicians'|| $_GET['inner']=='politician-profile')) {
                                    switch ($_GET['inner'] ) {
                                        case 'politicians':
                                            require_once 'views/politicians/politicians.php';
                                            Politicians();
                                            break;
                                        case 'politician-profile':
                                            require_once 'views/politician_profile/politician_profile_guest.php';
                                            PoliticianProfileGuest();
                                            break;
                                        case 'tambayan':
                                            require_once 'views/home/home.php';
                                            Home();
                                            break;
                                    }
                                } else{
                                    require_once 'views/home/home.php';
                                    Home();
                                }
                            } else if($_GET['main']=='about'){
                                require_once 'views/about/about.php';
                                About();
                            } else if($_GET['main']=='contactus'){
                                require_once 'views/under_construction/under_construction.php';
                                //TopStuff();
                                UnderConstruction();
                            } else if($_GET['main']=='search'){
                                require_once 'views/search/search.php';
                                Search();
                            } else if($_GET['main']=='donate'){
                                require_once 'views/donate/donate.php';
                                Donate();
                            } else if($_GET['main']=='ourpartners'){
                                require_once 'views/ourpartners/ourpartners.php';
                                OurPartners();
                            } else if($_GET['main']=='report'){
                                require_once 'views/report/report.php';
                                Report();
                            } else if($_GET['main']=='ourteam'){
                                require_once 'views/ourteam/ourteam.php';
                                OurTeam();
                            } else if($_GET['main']=='articles'){
                                require_once 'views/articles/articles.php';
                                Articles();
                            } else{
                                require_once 'views/home/home.php';
                                Home();
                            }
                        }
                        else{
                            require_once 'views/home/home.php';
                            Home();
                        }
                    } else{
                        require_once 'views/left_side_bar_facebook/left_side_bar_facebook.php';
                        LeftSideBar_Facebook();

                        if(isset($_GET['main']) && ($_GET['main']=='home' || $_GET['main']=='about' || $_GET['main']=='articles' || $_GET['main']=='contactus' || $_GET['main']=='ourteam' || $_GET['main']=='settings' || $_GET['main']=='donate' || $_GET['main']=='report'
                            || $_GET['main']=='search' || $_GET['main']=='ourpartners')){
                            if($_GET['main']=='home'){
                                if(isset($_GET['inner']) && ($_GET['inner']=='tambayan' || $_GET['inner']=='watchlist' || $_GET['inner']=='network' || $_GET['inner']=='user_wikip' || $_GET['inner']=='politicians'
                                    || $_GET['inner']=='politician-profile' || $_GET['inner']=='promise_url' || $_GET['inner']=='wikip_url' || $_GET['inner']=='user_profile')) {
                                    switch ($_GET['inner']) {
                                        case 'tambayan':
                                            require_once 'views/home/home.php';
                                            Home();
                                            break;
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
                                            if($_GET['user_id']!="" && is_numeric($_GET['user_id']))
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
                                        case 'promise_url':
                                            require_once 'views/promise_view/promise_view.php';
                                            if($_GET['promise_id']!="" && is_numeric($_GET['promise_id']))
                                                PromiseView($_GET['promise_id']);
                                            break;
                                        case 'wikip_url':
                                            require_once 'views/wikip_view/wikip_view.php';
                                            if($_GET['wikip_id']!="" && is_numeric($_GET['wikip_id']))
                                                WikipView($_GET['wikip_id']);
                                            break;
                                        case 'user_profile':
                                            require_once 'views/account_profile/account_profile.php';
                                            if($_GET['user_id']!="" && is_numeric($_GET['user_id']))
                                                AccountProfile($_GET['user_id']);
                                            break;
                                    }
                                } else{
                                    require_once 'views/news_feed/news_feed.php';
                                    NewsFeed();
                                }
                            } else if($_GET['main']=='about'){
                                require_once 'views/about/about.php';
                                About();
                            } else if($_GET['main']=='contactus'){
                                require_once 'views/under_construction/under_construction.php';
                                UnderConstruction();
                            } else if($_GET['main']=='settings'){
                                require_once 'views/settings/settings.php';
                                Settings();
                            } else if($_GET['main']=='deactivate'){
                                require_once 'modules/settings/deactivate.php';
                                Deactivate();
                            } else if($_GET['main']=='donate'){
                                require_once 'views/donate/donate.php';
                                Donate();
                            } else if($_GET['main']=='report'){
                                require_once 'views/report/report.php';
                                Report();
                            } else if($_GET['main']=='search'){
                                require_once 'views/search/search.php';
                                Search();
                            } else if($_GET['main']=='ourpartners'){
                                require_once 'views/ourpartners/ourpartners.php';
                                OurPartners();
                            } else if($_GET['main']=='ourteam'){
                                require_once 'views/ourteam/ourteam.php';
                                OurTeam();
                            } else if($_GET['main']=='articles'){
                                require_once 'views/articles/articles.php';
                                Articles();
                            }
                        } else{
                            require_once 'views/home/home.php';
                            Home();
                        }
                    }

                    echo '</div>
                </div>';
                Footer();
        echo    '<div class="modal fade" id="siteTour" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <script src="js/default.min.js"></script>
                <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=516429741767185";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, \'script\', \'facebook-jssdk\'));</script>
                <script type="text/javascript"> if(top.location!= self.location) top.location=self.location </script>';
            } else{
                require_once 'views/landing/landing.php';
                landing();
            }
        }
        ?>
    </body>
</html>