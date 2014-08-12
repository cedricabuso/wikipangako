<?php
require_once 'modules/politician/retrieve_all_politicians.php';

function UploadWikiPFacebook(){
    global $facebook;

    $user = $facebook->getUser();
    if($user){}
    else return;

    if(isset($_POST['message']) || isset($_FILES["source"]["name"])){
        global $database;
        if($database==null) Connect();
        
        $data = array();
        $result = $database->query("SELECT name FROM POLITICIAN WHERE politician_id=".$_POST['wikip-politician']);
        if(!empty($result)) while($row = $result->fetch_assoc()) array_push($data, $row);
        $parsed_name = str_replace(' ', '', $data[0]['name']);
        $parsed_name = str_replace('"', '', $parsed_name);
        $parsed_name = str_replace('.', '', $parsed_name);
        $parsed_name = str_replace(',', '', $parsed_name);

        try {
            $token = $facebook->getAccessToken();

            if(empty($_FILES["source"]["name"])){
                $response = $facebook->api(
                    '/me/photos?access_token=' . $token,
                    'post',
                    array(
                        'message' => '#wikipangako #'.$parsed_name.' '.$_POST['message'].' http://www.wikipangako.com',
                        'source' => '@img/wikip.png'
                    )
                );
            }else{
                $response = $facebook->api(
                    '/me/photos?access_token=' . $token,
                    'post',
                    array(
                        'message' => '#wikipangako #'.$parsed_name.' '.$_POST['message'].' http://www.wikipangako.com',
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
        echo    '<script>location.reload();</script>';
    }
    /*else if(isset($_POST['answer'])){
        require_once 'insert_question.php';
        InsertQuestion($_POST['answer'], $_POST['ask-politician'], $_SESSION['account_id']);
    }*/

    echo '
            <div class="upload-wikip-btn pull-right">';
            if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
            echo'<a data-toggle="modal" href="#wikip"><button id="upload-wikip-btn" class="btn add-on"><i class="icon-circle-arrow-up"></i> Add WikiP About this Politician</button></a>';
                /*<a data-toggle="modal" href="#answer"><button id="upload-answer-btn" class="btn add-on"><i class="icon-comment"></i> Ask this Politician a Question </button></a>*/
            else
                echo'<a data-toggle="modal" href="#wikip"><button id="upload-wikip-btn" class="btn add-on"><i class="icon-circle-arrow-up"></i> Add WikiP</button></a>';
               /*<a data-toggle="modal" href="#answer"><button id="upload-answer-btn" class="btn add-on"><i class="icon-comment"></i> Ask a Question </button></a>*/
    echo    '</div> 
            <br><br>
            <span class="pull-right" style="font-size: 16px;margin-right: -240px;">Want to share something confidential and keep your anonymity? Use this <a href="https://docs.google.com/forms/d/1b8z-YnnDFUFLxtlUYdEIZqmicu-25i7FJ9vJ66Bkovo/viewform" target="_blank">form</a>!</span>
            <form enctype="multipart/form-data" action="" method="POST" style="margin-top:-10px">
                <div class="modal fade hide" id="wikip" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Upload Wikip</h4>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail pull-left" style="width: 200px; height: 150px;"><img src="img/wikip.png"/></div>
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
            $('#wikip-politician').select2({
                multiple: false,
                placeholder: 'Tag a politician ...',
                minimumInputLength: 1,
                allowClear: true,
                data:".$data."
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