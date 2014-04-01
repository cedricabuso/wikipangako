<?php
require_once 'global.php';
require_once 'modules/tambayan/retrieve_news.php';
require_once 'modules/tambayan/retrieve_trending_politicians.php';
require_once 'modules/tambayan/retrieve_trending_wikips.php';
require_once 'modules/tambayan/retrieve_trending_promises.php';

function Home(){
    global $facebook;
    $data = RetrieveNews();
    $data2 = RetrieveTrendingPoliticians();
    $data3 = RetrieveTrendingWikips();
    $data4 = RetrieveTrendingPromises();

    echo '
        <script type="text/javascript" src="js/swfobject/swfobject.js"></script>
        <script type="text/javascript">
            var flashvars = {};
            flashvars.xml = "config.xml";
            var attributes = {};
            attributes.wmode = "transparent";
            attributes.id = "slider";
            swfobject.embedSWF("cu3er.swf", "cu3er-container", "317", "270", "9", "expressInstall.swf", flashvars, attributes);
        </script>
        <div class="newsfeed">
            <h2 style="margin-top: -50px;"><img style="padding-top: 35px;padding-bottom: 30px; padding-right: 20px;width: 75px;" src="img/wpcons/tambayanicon.png"/>Tambayan</h2>
            <hr style="margin-top: -45px;">
            <h3>Ano nga ba ang WikiPangako?</h3>
            <video class="pull-left" style="margin-right:2%; min-width:250px;" width="48%" controls>
                <source src="img/WikiPangako.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="padding-div pull-left" style="width:45%;font-size: 16px;margin-top:-8%;min-height: 955px;max-height: 955px;">
                <h3>What\'s Hot</h3>
                <div class="tabbable trending-tab">
                    <ul class="nav nav-tabs trending-nav">
                        <li class="active"><a href="#pane1" data-toggle="tab">Politicians</a></li>
                        <li><a href="#pane2" data-toggle="tab">WikiPs</a></li>
                        <li><a href="#pane3" data-toggle="tab">Promises</a></li>
                    </ul>
                    <div class="tab-content" style="min-height: 810px;">
                        <div id="pane1" class="tab-pane active">';
            if($data2){
                foreach ($data2 as $key) {
                    echo    '<div id="'.$key['politician_id'].'">
                                    <div class="news">';
                    echo                '<span>
                                            <img class="pic pull-left" src="img/politicians/'.$key['politician_id'].'.jpg" style="margin-left: 5px;width: 50px;height: 50px;"/>
                                            <b><a class="caption" title="'.$key['name'].'" href="?main=home&inner=politician-profile&id='.$key['politician_id'].'">&nbsp;'.$key['name'].'</a></b>
                                            <br/>
                                            <span>&nbsp;'.$key['position'].'</span>
                                            <br/>
                                            <span>&nbsp;'.$key['city'].'</span> <span>&nbsp;'.$key['province'].'</span>
                                        </span>';
                    echo            '</div>
                                </div><br>';
                }
            }

                echo    '</div>

                        <div id="pane2" class="tab-pane">';
                if($data3){
                    foreach ($data3 as $key) {
                        $caption = substr($key['caption'],0,70).'...';
                        echo    '<div id="'.$key['wikip_id'].'">
                                        <div class="news">';
                        echo                '<span>
                                                <img class="pic pull-left" src="img/politicians/'.$key['politician_id_fk'].'.jpg" style="margin-left: 5px;width: 50px;height: 50px;"/>
                                                <b><a class="tambayan-caption" title="View this wikip" href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '">'.$caption.'</a></b>
                                                <span class="tambayan-caption"><b>- </b>'.$key["name"].'</span>
                                            </span>';
                        echo            '</div>
                                    </div><br><br>';
                    }
                }
                echo    '</div>

                        <div id="pane3" class="tab-pane">';
                if($data4){
                    foreach ($data4 as $key) {
                        $details = substr($key['details'],0,70).'...';
                        echo    '<div id="'.$key['promise_id'].'">
                                        <div class="news">';
                        echo                '<span>
                                                <img class="pic pull-left" src="img/politicians/'.$key['politician_id_fk'].'.jpg" style="margin-left: 5px;width: 50px;height: 50px;"/>
                                                <b><a class="tambayan-caption" title="View this promise" href="?main=home&inner=promise_url&promise_id='. $key['promise_id'] . '">'.$key['name'].'</a></b>
                                                <span class="tambayan-caption">'.$details.'</span>
                                                <span class="tambayan-caption"><b>- </b>'.$key["politician_name"].'</span>
                                            </span>';
                        echo            '</div>
                                    </div><br/>';
                    }
                }
                echo    '</div>
                    </div>
                </div>
                <div>
                    <a class="twitter-timeline" href="https://twitter.com/Wikipangako" data-widget-id="443645811549683712">Tweets by @Wikipangako</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
            <div id="toprow" class="pull-left padding-div" style="width:45%;margin-right:3%;margin-top: -75%;font-size: 16px;">
                <div>
                    <h3>Articles</h3>';
            echo    '<div>
                        <div class="news">
                            <img class="pull-left" style="width: 125px;padding-right: 20px;padding-left: 5px;" src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-prn1/t1/1948240_819343298081494_1524329200_n.jpg"/>
                            <p style="font-size: 16px;margin-left: 140px;">
                                <b style="font-size: 20px;">An idea whose time has come</b><br><br>
                                by <b>ANNA OPOSA on March 6, 2014</b><br><br>
                                Wiki” is a Hawaiian word that means “very quick.” The name WikiPangako carries two meanings: a platform that provides quick access to promi ..... <br><br>
                                <a href="?main=articles&refs=an-idea-whose-time-has-come" style="color:#f27441;"><b>READ MORE</b></a>
                            </p>
                        </div>
                        <div class="news">
                            <img class="pull-left" style="width: 125px;padding-right: 20px;" src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-frc3/t1/1239657_819343321414825_1475502506_n.jpg"/>
                            <p style="font-size: 16px;margin-left: 140px;">
                                <b style="font-size: 20px;">A promise yet to be fulfilled</b><br><br>
                                by <b>ERNEST FRANCIS R. CALAYAG on March 6, 2014</b><br><br>
                                In an April 26, 2010 Inquirer article, “Higher education budget under LP, says Roxas,” a candidate for vice president, who is now the inter ....<br><br>
                                <a href="?main=articles&refs=a-promise-yet-to-be-fulfilled" style="color:#f27441;"><b>READ MORE</b></a>
                            </p>
                        </div>
                    </div>';
        echo    '</div>
            </div>
            <div class="padding-div" width="48%">
                <h3>Our Partners</h3>
                <div class="center">
                    <div id="cubershadow">
                        <div id="cu3er-container">
                            <a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="" /></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>';
}
?>