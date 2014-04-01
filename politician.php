<!DOCTYPE html>
<?php
require_once 'global.php';

//
//  politician.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 9/16/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
?>
<html>
<head>
    <title>WikiPangako</title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-fileupload.min.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen">
<link href="css/select2.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-fileupload.min.js"></script>
<script src="js/seemore.js"></script>
<script src="js/select2.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<body>

<?php
if(isset($_SESSION['account_id']) && isset($_SESSION['politician'])){
    //insert politician shit here
	require_once 'views/nav_bar/nav_bar.php';
    require_once 'views/footer/footer.php';	
	
	echo '<div class="mesh">';
    NavBar();
    echo '<div id="content-main" class="container">';
	
	require_once 'politician/views/left_side_bar/left_side_bar.php';
	LeftSideBar();
	
	if(isset($_GET['main'])){
        if($_GET['inner']=='project'){
            require_once 'politician/views/project/project.php';
            Project();    
        }
        else if($_GET['inner']=='answer'){
            require_once 'politician/views/news_feed/news_feed.php';
            NewsFeed();
        }
    }
    else{
        require_once 'politician/views/project/project.php';
        Project();   
    }
	
	echo '</div>
                           </div>';

    Footer();
}
else header('Location: http://www.wikipangako.com/');
?>

<script src="js/default.js"></script>
</body>
</html>