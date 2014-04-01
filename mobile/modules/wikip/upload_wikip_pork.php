<?php
require_once 'modules/promise/promise_counts.php';

function UploadWikiPork($politician_id, $promise_id){
    global $facebook;

    $user = $facebook->getUser();
    if($user){
        /*if(!isset($_REQUEST["code"])){
            $app_id = $facebook->getAppId();

            $dialog_url= "http://www.facebook.com/dialog/oauth?"
                . "client_id=" .  $app_id
                .  "&scope=publish_stream";
            echo("<script>top.location.href='" . $dialog_url
                . "'</script>");
        }*/
    }
    else
        return;

    if(isset($_FILES[$promise_id.'-source']['name']))
        echo    '<div class="alert alert-success" style="font-size:18px;">
                    <a class="close" data-dismiss="alert">&times;</a>
                    Succesfully posted your wikip/question!
                </div>
                <script>$(".alert-success").fadeOut(8000); location.reload();</script>
        ';

    $data4 = PromiseCount($_SESSION['account_id'], $promise_id);
    echo '
        <div>
            <div class="upload-wikip-btn pull-right">
                <a data-toggle="modal" class="pull-right" href="#'.$promise_id.'-wikip-pork"><button id="upload-wikip-btn" class="btn add-on"><i class="icon-circle-arrow-up"></i> Upload WikiP About this Project</button></a>
                <br><br>
                <div class="btn-group pull-right">';
    if($data4['is_selected'][0]['status']=='1')
        echo        '<button id="'.$promise_id.'-finished" class="btn btn-success finished active" onclick="ratePromise(1, '.$_SESSION['account_id'].', '.$promise_id.', \''.$promise_id.'-finished\');"><i class="icon-white icon-ok"></i> Finished | <b class="finished-count">'.$data4['done'][0]['done'].'</b></button>';
    else
        echo        '<button id="'.$promise_id.'-finished" class="btn btn-inverse finished" onclick="ratePromise(1, '.$_SESSION['account_id'].', '.$promise_id.', \''.$promise_id.'-finished\');"><i class="icon-white icon-ok"></i> Finished | <b class="finished-count">'.$data4['done'][0]['done'].'</b></button>'; 
    if($data4['is_selected'][0]['status']=='2')
        echo        '<button id="'.$promise_id.'-inprogress" class="btn btn-info inprogress active" onclick="ratePromise(2, '.$_SESSION['account_id'].', '.$promise_id.', \''.$promise_id.'-inprogress\');"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data4['inprogress'][0]['inprogress'].'</b></button>';
    else
        echo        '<button id="'.$promise_id.'-inprogress" class="btn btn-inverse inprogress" onclick="ratePromise(2, '.$_SESSION['account_id'].', '.$promise_id.', \''.$promise_id.'-inprogress\');"><i class="icon-white icon-tasks"></i> In Progress | <b class="inprogress-count">'.$data4['inprogress'][0]['inprogress'].'</b></button>';
    if($data4['is_selected'][0]['status']=='4')
        echo        '<button id="'.$promise_id.'-failed" class="btn btn-danger failed active" onclick="ratePromise(4, '.$_SESSION['account_id'].', '.$promise_id.', \''.$promise_id.'-failed\');"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data4['failed'][0]['failed'].'</b></button>';
    else
        echo        '<button id="'.$promise_id.'-failed" class="btn btn-inverse failed" onclick="ratePromise(4, '.$_SESSION['account_id'].', '.$promise_id.', \''.$promise_id.'-failed\');"><i class="icon-white icon-remove"></i> Napako | <b class="failed-count">'.$data4['failed'][0]['failed'].'</b></button>';

    echo    '</div>
            </div>
            <form id="'.$promise_id.'-form" enctype="multipart/form-data" action="" method="POST" style="margin-top:-20px">
                <div class="modal fade hide" id="'.$promise_id.'-wikip-pork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Upload Wikip</h4>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail pull-left" style="width: 200px; height: 150px;"><img src="img/aw.jpg"/></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail pull-left" style="width: 200px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                        <span class="fileupload-exists">Change</span><input type="file" name="'.$promise_id.'-source"/></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <textarea id="message" name="'.$promise_id.'-message" placeholder="Say something about this project ... " required="required"></textarea>
                                    <input id="'.$promise_id.'-account-hidden" type="hidden" name="account" value="'.$_SESSION['account_id'].'"/>
                                    <input id="'.$promise_id.'-politician-hidden" type="hidden" name="politician" value="'.$politician_id.'"/>
                                    <input id="'.$promise_id.'-promise-hidden" type="hidden" name="promise" value="'.$promise_id.'"/>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" value="Upload" class="upload btn btn-primary pull-right"/>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </form>
        </div>';

    if(isset($_FILES[$promise_id.'-source']['name']))
    {
        try {
            $token = $facebook->getAccessToken();

            if(empty($_FILES[$promise_id.'-source']['name'])){
                $response = $facebook->api(
                    '/me/photos?access_token=' . $token,
                    'post',
                    array(
                        'message' => '#wikipangako #pangakowatch '.$_POST[$promise_id.'-message'],
                        'source' => '@img/aw.jpg'
                    )
                );
            }
            else{
                $response = $facebook->api(
                    '/me/photos?access_token=' . $token,
                    'post',
                    array(
                        'message' => '#pangakowatch #wikipangako '.$_POST[$promise_id.'-message'],
                        'source' => '@'.$_FILES[$promise_id.'-source']['tmp_name']
                    )
                );
            }

            require_once 'insert_wikip.php';
            $photo = $facebook->api('/' . $response['id']);
            InsertWikiPork($photo['source'], $_POST['message'], $_POST['politician'],  $_SESSION['account_id'], $_POST['promise_id']);
        }
        catch (FacebookApiException $e) {
            echo 'Could not post image';
            error_log('Could not post image to Facebook.');
        }
    }
}
?>