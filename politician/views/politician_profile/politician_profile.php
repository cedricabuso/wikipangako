<?php
require_once 'global.php';
require_once 'modules/politician/retrieve_politician_profile.php';
require_once 'modules/politician/get_ratings.php';
require_once 'modules/wikip/retrieve_wikip_from_politician.php';
require_once 'modules/wikip/upload_wikip_facebook.php';

function PoliticianProfile(){
    global $facebook;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = RetrievePoliticianProfile($id);
        $data2 = RetrieveWikiPFromPolitician($id);
    }

    echo '
        <div id="network-container" class="newsfeed">
            <div class="politician-profile">
                <button id="edit-info" class="btn btn-primary pull-right"><i class="icon-white icon-edit"></i> Edit Info</button>
                <img class="politician-pic pull-left" src="img/' . $data['politician_id'].'.jpg"><br>
                <span class="politician-fullname">'.$data['name'].'</span><br>
                <span class="politician-subtitle politician-position">'.$data['position'].'</span><br>
                <span class="politician-subtitle politician-municipal">'.$data['city'].'</span><br>
                <span class="politician-subtitle politician-region">'.$data['province'].'</span>
            </div>';
            $rating_data = GetRatings($_SESSION['account_id'],$id);
            if(empty($rating_data['like']) || empty($rating_data['hate']) || empty($rating_data['user_rating']))
                $rate = 0;
            else
                $rate = $rating_data['like'][0]['like'] - $rating_data['hate'][0]['hate'];

            echo '
                <div class="politician-rate pull-right">
                    <center><span id="politician-rating">'.$rate.'</span></center>';

            if($rating_data['user_rating']){
                if($rating_data['user_rating'][0]['rating']=='1')
                    echo'<button class="btn btn-success rate like" title="Rate Up"><i class="icon-circle-arrow-up icon-white"></i></button>';
                else
                    echo '<button class="btn btn-info rate like" title="Rate Up"><i class="icon-circle-arrow-up icon-white"></i></button>';

                if($rating_data['user_rating'][0]['rating']=='0')
                    echo'<button class="btn btn-danger rate hate" title="Rate Down"><i class="icon-circle-arrow-down icon-white"></i></button>';
                else
                    echo '<button class="btn btn-info rate hate" title="Rate Down"><i class="icon-circle-arrow-down icon-white"></i></button>';
            }
            else
                echo '<button class="btn btn-info rate like" title="Rate Up"><i class="icon-circle-arrow-up icon-white"></i></button>
                       <button class="btn btn-info rate hate" title="Rate Down"><i class="icon-circle-arrow-down icon-white"></i></button>';

            echo    '<input type="hidden" id="account-id" value="'.$_SESSION['account_id'].'"/>
                    <input type="hidden" id="politician-id" value="'.$id.'"/>
                </div>';

    echo    '<div class="tabbable politician-tab">
                <ul class="nav nav-tabs polit-nav">
                    <li class="active"><a href="#pane1" data-toggle="tab">WikiPs</a></li>
                    <li><a href="#pane2" data-toggle="tab">Profile</a></li>
                    <li><a href="#pane3" data-toggle="tab">Pangako</a></li>
                    <li><a href="#pane4" data-toggle="tab">Statistics</a></li>
                    <li><a href="#pane5" data-toggle="tab">Answers</a></li>
                    <li><a href="#pane6" data-toggle="tab">PDAF</a></li>
                </ul>
                <div class="tab-content">
                    <div id="pane1" class="tab-pane active">';
                    UploadWikiPFacebook();
    echo            '
                        <hr class="sort-top">
                            <ul class="sort">
                                <li class="dropdown">
                                <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown">Sort <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Top Stories</a></li>
                                        <li><a href="#">Most Recent</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <hr class="sort-right">';

    if($data2){
        foreach ($data2 as $key) {
            $object = $facebook->api('/' . $key['facebook_id']);
            if(!$key['url'])
                echo    '<div class="post">
                             <div class="news">
                                <img class="profpic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?type=square">
                                <span class="date pull-right">'.$key['date_added'].'</span>
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    <a href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '">'.$key['caption'].'</a>
                                    <br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>
                            </div>
                        </div>';
            else
                echo    '<div class="post">
                            <div class="news">
                                <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?type=square">
                                <span class="date pull-right">'.$key['date_added'].'</span>
                                <a href="?main=home&inner=user_profile&user_id=' . $key['account_id'] . '"><span class="fullname">'. $object['name'] .'</span><br><br></a>
                                <span class="content comment more">
                                    '.$key['caption'].'<br/>
                                    <a href="?main=home&inner=wikip_url&wikip_id='. $key['wikip_id'] . '"><img class="news-pic" src="'.$key['url'].'"></a>
                                    <br/>
                                    <span class="tagged-politician"><b>Tagged Politician: </b> <a href="?main=home&inner=politician-profile&id=' . $key["politician_id"] . '">'.$key["name"].'</a></span>
                                </span>
                            </div>
                        </div>';
        }
    }

    echo '          </div>
                    <div id="pane2" class="tab-pane">
                        <h4>Profile</h4>
                        <button id="edit-profile" class="btn btn-primary pull-right"><i class="icon-white icon-edit"></i> Edit Profile</button>
                        <div>
                            <table>
                                <tr>
                                    <td class="info-left">Birthday:</td><td class="politician-birthday">'.$key['birthday'].'</td>
                                </tr>
                                <tr>
                                    <td class="info-left">Educational Background:</td><td class="politician-background">'.$key['educational_background'].'</td>
                                </tr>
                                <tr>
                                </tr>
                                    <td class="info-left">Former Elected Positions:</td><td class="politician-elected">'.$key['former_elected_positions'].'</td>
                                <tr>
                                    <td class="info-left">Political Party:</td><td class="politician-party">'.$key['political_party'].'</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="pane3" class="tab-pane">
                        <h4>Pangako</h4>
                    </div>
                    <div id="pane4" class="tab-pane">
                        <h4>Statistics</h4>
                    </div>
                    <div id="pane5" class="tab-pane">
                        <h4>Answers</h4>
                    </div>
                    <div id="pane6" class="tab-pane">
                        <button id="add-pdaf" class="btn btn-primary pull-right"><i class="icon-white icon-edit"></i> Add PDAF</button>
                        <h4>PDAF</h4>
                        <br>
                        <div id="accordion">
                            <h3>Porky Porky</h3>
                            <div>
                                <button id="edit-pdaf" class="btn pull-right" title="Edit PDAF"><i class="icon-edit"></i></button>
                                <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-inverse finished"><i class="icon-white icon-ok"></i> Finished</button>
                                    <button class="btn btn-inverse inprogress"><i class="icon-white icon-tasks"></i> In Progress</button>
                                    <button class="btn btn-inverse stalled"><i class="icon-white icon-pause"></i> Stalled</button>
                                    <button class="btn btn-inverse failed"><i class="icon-white icon-remove"></i> Failed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->
        </div>
    ';
}
?>