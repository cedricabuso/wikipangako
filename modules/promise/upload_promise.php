<?php
require_once 'modules/politician/retrieve_all_politicians.php';

function UploadPromise(){
    global $facebook;

    $user = $facebook->getUser();
    if($user){}
    else return;

    if(isset($_POST['promise'])){
        require_once 'insert_promise.php';
        if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
            InsertPromise($_GET['id'], $_POST['promise-name'], $_POST['promise'], $_POST['promise-sources'], $_POST['category']);
        else
            InsertPromise($_POST['promise-politician'], $_POST['promise-name'], $_POST['promise'], $_POST['promise-sources'], $_POST['category']);
        echo    '<div class="alert alert-success" style="font-size:18px;">
                    <a class="close" data-dismiss="alert">&times;</a>
                    Succesfully submitted the promise!
                </div>
                <script>$(".alert-success").fadeOut(8000); location.reload();</script>
        ';
    }

    echo '
        <div>
            <div class="upload-wikip-btn pull-right">';
            if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
                echo '<a data-toggle="modal" href="#promise-form"><button id="upload-promise-btn" class="btn"><i class="icon-bullhorn"></i> Add Promise of this Politician</button></a>';
            else
                echo '<a data-toggle="modal" href="#promise-form"><button id="upload-promise-btn" class="btn"><i class="icon-bullhorn"></i> Add Promise of a Politician</button></a>';
    echo   '
            </div>
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="modal fade hide" id="promise-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Upload Promise</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                	<input type="text" id="promise-name" name="promise-name" required="required" placeholder="Name of Promise" /><br>
                                    <select id="category" name="category" required="required">
                                        <option value="">Select promise category ...</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Education">Education</option>
                                        <option value="Employment and Livelihood">Employment and Livelihood</option>
                                        <option value="Environment and Climate Change">Environment and Climate Change</option>
                                        <option value="Food">Food</option>
                                        <option value="Good Governance">Good Governance</option>
                                        <option value="Health">Health</option>
                                        <option value="Housing">Housing</option>
                                        <option value="Infrastructure">Infrastructure</option>
                                        <option value="Peace, Law and Order">Peace, Law and Order</option>
                                        <option value="Utilities">Utilities</option>
                                    </select>
                                    <textarea id="promise" name="promise" class="answer" placeholder="Insert promise details here ... " required="required"></textarea>
                                    <textarea id="promise-sources" name="promise-sources" class="answer" placeholder="Insert sources here... Separate each source using commas (e.g. - https://www.facebook.com/,https://www.google.com.ph)" required="required"></textarea>';
                            if(isset($_GET['inner']) && $_GET['inner']=='politician-profile' && isset($_GET['id']))
                                echo'<input id="promise-politician" type="hidden" name="promise-politician" value="'.$_GET['id'].'"/>';
                            else        
                                echo'<b>Tag a politician:</b>
                                    <input id="promise-politician" type="hidden" name="promise-politician"/><br><br><br>';
    echo                        '</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input id="submit-promise" type="submit" value="Submit Promise" class="ask upload btn btn-primary pull-right"/>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          </form>
        </div>';

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
        </script>
    ";
}
?>