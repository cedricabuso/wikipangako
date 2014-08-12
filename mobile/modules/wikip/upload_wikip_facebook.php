<?php
require_once 'modules/politician/retrieve_all_politicians.php';

function UploadWikiPFacebook(){
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

    if(isset($_POST['message']) || isset($_FILES["source"]["name"])){
        try {
            $token = $facebook->getAccessToken();

            if(empty($_FILES["source"]["name"])){
                $response = $facebook->api(
                    '/me/photos?access_token=' . $token,
                    'post',
                    array(
                        'message' => '#wikipangako '.$_POST['message'],
                        'source' => '@img/aw.jpg'
                    )
                );
            }else{
                $response = $facebook->api(
                    '/me/photos?access_token=' . $token,
                    'post',
                    array(
                        'message' => '#wikipangako '.$_POST['message'],
                        'source' => '@'.$_FILES["source"]["tmp_name"]
                    )
                );
            }

            require_once 'insert_wikip.php';
            $photo = $facebook->api('/' . $response['id']);
            InsertWikiP($photo['source'], $_POST['message'], $_POST['wikip-politician'],  $_SESSION['account_id']);
        }
        catch (FacebookApiException $e) {
            echo 'Could not post image';
            error_log('Could not post image to Facebook.');
        }
        echo    '<div class="alert alert-success" style="font-size:18px;">
                    <a class="close" data-dismiss="alert">&times;</a>
                    Succesfully posted your wikip/question!
                </div>
                <script>$(".alert-success").fadeOut(8000); location.reload();</script>';
    }
    /*else if(isset($_POST['answer'])){
        require_once 'insert_question.php';
        InsertQuestion($_POST['answer'], $_POST['ask-politician'], $_SESSION['account_id']);
    }*/

    echo '
            <div class="upload-wikip-btn pull-right">';
            if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
            echo'<a data-toggle="modal" href="#wikip"><button id="upload-wikip-btn" class="btn add-on"><i class="icon-circle-arrow-up"></i> Upload WikiP About this Politician</button></a>';
                /*<a data-toggle="modal" href="#answer"><button id="upload-answer-btn" class="btn add-on"><i class="icon-comment"></i> Ask this Politician a Question </button></a>*/
            else
                echo'<a data-toggle="modal" href="#wikip"><button id="upload-wikip-btn" class="btn add-on"><i class="icon-circle-arrow-up"></i> Upload WikiP</button></a>';
               /*<a data-toggle="modal" href="#answer"><button id="upload-answer-btn" class="btn add-on"><i class="icon-comment"></i> Ask a Question </button></a>*/
    echo    '</div>
            <form enctype="multipart/form-data" action="" method="POST" style="margin-top:-10px">
                <div class="modal fade hide" id="wikip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <span class="fileupload-exists">Change</span><input type="file" name="source"/></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <textarea id="message" name="message" placeholder="Say something about this politician ... " required="required"></textarea>';
                            if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
                                echo'<input id="wikip-politician" type="hidden" name="wikip-politician" required="required" value="'.$_GET['id'].'"/>';
                            else        
                                echo'<b>Tag a politician:</b><br>
                                        <input id="wikip-politician" type="hidden" name="wikip-politician"/><br><br><br>';
    echo                        '</div>
                            </div><br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" value="Upload" class="wikip upload btn btn-primary pull-right"/>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          </form>';

          /*<form enctype="multipart/form-data" action="" method="POST">
                <div class="modal fade hide" id="answer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Ask Question</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <textarea id="answer" name="answer" class="answer" placeholder="Ask a politician about something ... " required="required"></textarea>';
                            if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
                                echo'<input id="ask-politician" type="hidden" name="ask-politician" required="required" value="'.$_GET['id'].'"/>';
                            else        
                                echo'<b>Tag a politician:</b>
                                        <input id="ask-politician" type="hidden" name="ask-politician"/><br><br><br>';
    echo                        '</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" value="Ask" class="ask upload btn btn-primary pull-right"/>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          </form>
    ';*/

    $data = RetrieveAllPoliticians();
    $data = str_replace('null', '"null"', $data);
    $data = str_replace('"id"', 'id', $data);
    $data = str_replace('"text"', 'text', $data);
    $data = str_replace('\"', '', $data);
    $data = str_replace('"', '\'', $data);
    $data = str_replace('{', '{ ', $data);
    $data = str_replace(',', ', ', $data);
    $data = str_replace(':', ': ', $data);
    if(isset($_GET['inner']) && $_GET['inner']=='user_wikip')
    echo "
        <script>
            var preload_data = ".$data.";

            $('#wikip-politician').select2({
                multiple: false,
                placeholder: 'Tag a politician ...',
                minimumInputLength: 1,
                data:{ results: preload_data, text: 'text' }
            });
        </script>";

            /*$('#ask-politician').select2({
                multiple: false,
                placeholder: 'Tag a politician ...',
                minimumInputLength: 1,
                data:{ results: preload_data, text: 'text' }
            });*/
}
?>