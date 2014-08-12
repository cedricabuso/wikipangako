<?php
//
//  promise_view.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 11/6/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//

require_once 'modules/promise/retrieve_one_promise.php';
require_once 'modules/promise/promise_counts.php';

function PromiseView($promise_id){
    $data = RetrieveOnePromise($promise_id);

    echo '
        <input id="account_id" type="hidden" value="'.$_SESSION['account_id'].'"/>
        <div class="newsfeed">
            <hr>';
    if($data){
        foreach($data as $key){

            $data5 = PromiseCount($_SESSION['account_id'], $key['promise_id']);
            if($data5['done'][0]['done']==0 && $data5['inprogress'][0]['inprogress']==0 && $data5['failed'][0]['failed']==0)
                $people_say = 'This project/promise is still unrated.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['done'][0]['done'] )
                $people_say = 'Most people say this is <b style="color: #51a351;">Fulfilled</b>.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['inprogress'][0]['inprogress'] )
                $people_say = 'Most people say this is <b style="color: #2f96b4">In Progress</b>.';
            else if( (max($data5['done'][0]['done'], $data5['inprogress'][0]['inprogress'], $data5['failed'][0]['failed'])) == $data5['failed'][0]['failed'] )
                $people_say = 'Most people say this is <b style="color: #bd362f;">Napako</b>.';

            $parsed_name = str_replace(' ', '', $key['politician_name']);
            $parsed_name = str_replace('"', '', $parsed_name);
            $parsed_name = str_replace('.', '', $parsed_name);
            $tokenize = explode(",", $key['sources']);
            echo    '<div id="'.$key['promise_id'].'">
                            <div class="post">
                                <img class="pic pull-left" src="http://graph.facebook.com/'. $key['facebook_id'] .'/picture?width=200&height=200">';
                if($key['account_id_fk']==$_SESSION['account_id']){
                    echo        '<ul class="wikip-menu sort pull-right">
                                    <li class="dropdown pull-right">
                                    <a href="#" id="sort" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="close">&times;</button></a>
                                        <ul class="dropdown-menu">
                                            <li><a id="'.$key['promise_id'].'-delete" href="javascript:void(0)" class="delete-promise">Delete Promise</a></li>
                                        </ul>
                                    </li>
                                </ul>';
                }
                echo            '<a href="?main=home&inner=user_profile&user_id=' . $key['account_id_fk'] . '"><span class="fullname">'. $key['account_name'] .'</span></a> cited a Promise<br><br>
                                <img class="pic pull-left" src="img/politicians/'.$key['politician_id_fk'].'.jpg" style="margin-left: 5px;width: 70px;height: 70px;"/>
                                <a href="?main=home&inner=politician-profile&id='.$key['politician_id_fk'].'" <span class="fullname">'.$key['politician_name'].'</span><br><br></a>
                                <span class="content comment">
                                    <b>'.$key['name'].'</b> <span class="pull-right" style="font-size: 14px;font-style: italic;">'.$people_say.'</span><br>
                                    <p>'.$key['details'].'</p>';
                            foreach($tokenize as $value) {
                                echo  '<p><a href="'.$value.'" target="_blank">'.$value.'</a></p>';
                            }
                    if($key['category']!=null) echo '<p><b>Category: </b>'.$key['category'].'</p>';
                        echo    '</span>
                                <span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['promise_id'].'-tweet-count" style="margin: 0 3px 5px; text-align: center;">'.$key['tweet_count'].'</p>
                                        </div>
                                    </div>
                                    <a id="'.$key['promise_id'].'-tweet-promise" class="btn btn-info btn-small tweet-promise" href="javascript:void(0)" title="Share on Twitter"><img class="social-button" src="../img/glyphicons_twitter.png">Tweet</a>
                                </span>
                                <input id="'.$key['promise_id'].'-tweet-promise-details" type="hidden" value="'.$parsed_name.' '.$key['details'].'" />

                                <span class="nav pull-right" style="padding-right: 10px;">
                                    <div class="popover top" style="display:block; position:relative; margin-top: -33px; margin-bottom: 4px; margin-left: 10px; width: 50px;">
                                        <div class="arrow"></div>
                                        <div class="popover-content" style="padding: 0px 6px;">
                                            <p class="'.$key['promise_id'].'-share-count" style="margin: 0 3px 5px; text-align: center;">'.$key['share_count'].'</p>
                                        </div>
                                    </div>
                                    <a id="'.$key['promise_id'].'-share-promise" class="btn btn-primary btn-small share-promise" href="javascript:void(0)" title="Share on Facebook"><img class="social-button" src="../img/glyphicons_facebook.png">Share</a>
                                </span>
                                <input id="'.$key['promise_id'].'-share-promise-name" type="hidden" value="'.$key['name'].'" />
                                <input id="'.$key['promise_id'].'-share-promise-details" type="hidden" value="'.$key['details'].'" />
                                <input id="'.$key['promise_id'].'-share-promise-politician" type="hidden" value="'.$key['politician_id_fk'].'" />
                                <input id="'.$key['promise_id'].'-share-promise-politician-name" type="hidden" value="'.$key['politician_name'].'" />
                                <br><br></br>';

                        echo     '<div class="btn-group pull-right">';
                        if($data5['is_selected'] && $data5['is_selected'][0]['status']=='1')
                            echo '<button id="'.$key['promise_id'].'-finished" class="btn btn-success finished active"><i class="icon-white icon-ok"></i> Fulfilled | <b class="finished-count">'.$data5['done'][0]['done'].'</b></button>';
                        else
                            echo '<button id="'.$key['promise_id'].'-finished" class="btn btn-inverse finished"><i class="icon-white icon-ok"></i> Fulfilled | <b class="finished-count">'.$data5['done'][0]['done'].'</b></button>';
                        if($data5['is_selected'] && $data5['is_selected'][0]['status']=='2')
                            echo '<button id="'.$key['promise_id'].'-inprogress" class="btn btn-warning inprogress active"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data5['inprogress'][0]['inprogress'].'</b></button>';
                        else
                            echo '<button id="'.$key['promise_id'].'-inprogress" class="btn btn-inverse inprogress"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data5['inprogress'][0]['inprogress'].'</b></button>';
                        if($data5['is_selected'] && $data5['is_selected'][0]['status']=='4')
                            echo '<button id="'.$key['promise_id'].'-failed" class="btn btn-danger failed active"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data5['failed'][0]['failed'].'</b></button>';
                        else
                            echo '<button id="'.$key['promise_id'].'-failed" class="btn btn-inverse failed"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data5['failed'][0]['failed'].'</b></button>';

                        echo    '</div>
                        </div>
                    </div>';
        }
    }
    echo '</div>';
}
?>