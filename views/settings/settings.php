<?php
require_once 'global.php';
require_once 'modules/settings/is_searchable.php';
require_once 'modules/settings/account_state.php';

function Settings(){
    
    if(isset($_POST['search'])){
        require_once 'modules/settings/state.php';
        require_once 'modules/settings/searchable.php';
        $filter = $_POST['filter'];
        $filter = $_POST['status'];

        if($_POST['filter']=='yes')
            $data = Searchable(1, $_SESSION['account_id']);
        else
            $data = Searchable(0, $_SESSION['account_id']);

        if($_POST['status']=='public')
            $data = State(0, $_SESSION['account_id']);
        else
            $data = State(1, $_SESSION['account_id']);

        echo '<script>location.reload();</script>';
    }

    $is_searchable = IsSearchable($_SESSION['account_id']);
    $account_state = AccountState($_SESSION['account_id']);

    echo '
        <div id="politician-container" class="newsfeed">
            <h4>Profile Settings</h4> <hr class="watch-top">
            <div id="search-network">
                <a href="?main=deactivate" class="btn btn-danger pull-right"><i class="icon-white icon-off"></i> Deactivate Account</a>
                <form id="searchable" name="searchable" method="post" action="">
                    <h5>Searchable Profile</h5>';
        if($is_searchable[0]['searchable']=='1')
            echo    '<input type="radio" id="yes" name="filter" value="yes" checked="checked"><label class="net-label" for="yes">Yes</label>&nbsp;
                    <input type="radio" id="no" name="filter" value="no"><label class="net-label" for="no">No</label>';
        else
            echo    '<input type="radio" id="yes" name="filter" value="yes"><label class="net-label" for="yes">Yes</label>&nbsp;
                    <input type="radio" id="no" name="filter" value="no" checked="checked"><label class="net-label" for="no">No</label>';
   
        echo        '<br>
                    <h5>Profile Status</h5>';
        if($account_state[0]['privacy']=='0')
            echo    '<input type="radio" id="public" name="status" value="public" checked="checked"><label class="net-label" for="public">Public</label>&nbsp;
                    <input type="radio" id="private" name="status" value="private"><label class="net-label" for="private">Private</label>';
        else
            echo    '<input type="radio" id="public" name="status" value="public"><label class="net-label" for="public">Public</label>&nbsp;
                    <input type="radio" id="private" name="status" value="private" checked="checked"><label class="net-label" for="private">Private</label>';
        echo        '<br>
                    <button name="search" class="btn btn-primary"> Save</button>
                </form>
            </div>
        </div>';
}
?>