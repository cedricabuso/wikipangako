<?php
if(isset($_POST['action'])){
    require_once '../../database.php';
    require_once '../../global.php';
    require_once '../register/register_facebook.php';

    global $facebook;

    if(!$_SESSION && $facebook->getUser()){
        $user_profile = $facebook->api('/me','GET');
        $_SESSION['account_id'] = RegisterFacebook($user_profile['id'], $user_profile['name']);
    }
    $action = $_POST['action'];

    switch ($action) {
        case 'login':
            require_once '../login/login_bak.php';

            $username = $_POST['username'];
            $password = $_POST['password'];

            Login($username, $password);
            break;

        case 'addWatchlist':
            require_once '../watchlist/add_watchlist.php';

            $id = $_POST['id'];
            $account_id = $_POST['account_id'];

            AddWatchlist($account_id, $id);
            break;

        case 'addContact':
            require_once '../network/add_contact.php';

            $account_id1 = $_POST['account_id1'];
            $account_id2 = $_POST['account_id2'];

            AddContact($account_id1, $account_id2);
            break;

        case 'ratePolitician':
            require_once '../politician/rate_politician.php';

            $rating = $_POST['rating'];
            $account_id = $_POST['account_id'];
            $politician_id = $_POST['politician_id'];

            RatePolitician($rating, $account_id, $politician_id);
            break;

        case 'deleteWikip':
            require_once '../wikip/delete_wikip.php';

            $wikip_id = $_POST['wikip_id'];

            DeleteWikip($wikip_id);
            break;

        case 'deletePromise':
            require_once '../promise/delete_promise.php';

            $promise_id = $_POST['promise_id'];
            DeletePromise($promise_id);
            break;

        case 'ratePromise':
            require_once '../promise/track_promise.php';

            $status = $_POST['status'];
            $account_id = $_POST['account_id'];
            $promise_id = $_POST['promise_id'];
            TrackPromise($status, $account_id, $promise_id);
            break;

        case 'demandAnswer':
            require_once '../wikip/increment_demand_question.php';

            $wikip_id = $_POST['wikip_id'];
            $account_id = $_POST['account_id'];
            IncrementDemandQuestion($wikip_id, $account_id);
            break;

        case 'saveProfile':
            require_once '../politician/edit_wikiprofile.php';

            $details = $_POST['details'];
            $category = $_POST['category'];
            $account_id = $_POST['account_id'];
            $politician_id = $_POST['politician_id'];
            EditWikiProfile($politician_id, $account_id, $category, $details);
            break;

        case 'incrementStatsCount':
            require_once '../tambayan/increment_stats_count.php';

            $id = $_POST['id'];
            $stats = $_POST['stats'];
            $type = $_POST['type'];

            IncrementStatsCount($id, $stats, $type);
            break;

        case 'isSeen':
            require_once '../notification/is_seen.php';

            $account_id = $_POST['account_id'];

            IsSeen($account_id);
            break;

        case 'retrieveWikipsLazy':
            require_once '../wikip/retrieve_wikips_lazy.php';

            $last_timestamp = $_POST['last_timestamp'];

            RetrieveWikipsLazy($last_timestamp);
            break;
    }
}
?>