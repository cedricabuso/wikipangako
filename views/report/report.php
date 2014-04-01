<?php
require_once 'global.php';

function Report(){
    
    if(isset($_POST['submit'])){
        global $facebook;
        $user = $facebook->getUser();
        if($user){}
        else return;
       
        $category = $_POST['category'];
        $details = $_POST['details'];
        if(isset($_FILES["source"]["name"])){
            try {
                $facebook->setFileUploadSupport(true);
                $token = $facebook->getAccessToken();
                $create_album = $facebook->api(
                    '/me/albums?access_token='.$token,
                    'post',
                    array(
                        'name' => 'WikiPangako Reports',
                        'privacy'=> 'SELF'
                    )
                );
                  
                if(empty($_FILES["source"]["name"])){
                    $response = $facebook->api(
                        '/'.$create_album['id'].'/photos?access_token='.$token,
                        'post',
                        array(
                            'message' => '#wikipangakoReport',
                            'source' => '@img/wikip.png'
                        )
                    );
                }else{
                    $response = $facebook->api(
                        '/'.$create_album['id'].'/photos?access_token='.$token,
                        'post',
                        array(
                            'message' => '#wikipangakoReport',
                            'source' => '@'.$_FILES["source"]["tmp_name"]
                        )
                    );
                }
                require_once 'modules/report/insert_report.php';
                $photo = $facebook->api('/' . $response['id']);
                InsertReport($category, $details, $photo['source']);
            }
            catch (FacebookApiException $e) {
                echo 'Could not post image';
                error_log('Could not post image to Facebook.');
            }
            echo    '<script>location.reload();</script>';
        }
        echo '<script>alert("Thank you for submitting a report. We will do what we can as soon as possible.");location.reload();</script>';
    }

    echo '
        <div id="politician-container" class="newsfeed">
            <h4>Report</h4> <hr class="watch-top">
            <div id="search-network">
                <center>
                    <form id="report" name="report" enctype="multipart/form-data" method="post" action="">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="img/wikip.png"/></div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="width: 300px; height: 250px;"></div>
                            <div>
                                <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                <span class="fileupload-exists">Change</span><input id="source" type="file" name="source"/></span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                            </div>
                        </div>
                        <b style="font-size: 18px;">Report Category: </b>
                        <select id="category" name="category" required="required">
                            <option value="">Please select a category</option>
                            <option value="bug">Report a bug</option>
                            <option value="post">Report a post</option>
                            <option value="user">Report a user</option>
                        </select><br>
                        <textarea style="width: 90%;height: 200px;" id="details" name="details" placeholder="Put details here ... " required="required"></textarea>
                        <button name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </center>
            </div>
        </div>';
}
?>