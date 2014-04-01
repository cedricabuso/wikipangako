<?php
if(isset($_POST['action'])){
    require_once '../../database.php';

    $action = $_POST['action'];

    switch ($action) {
        case 'register':
            require_once '../register/register.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            Register($username, $password, $email)
            break;

        case 'registerFacebook':
            require_once '../register/register_facebook.php';

            $facebook_id = $_POST['facebook_id'];
            $name = $_POST['name'];

            RegisterFacebook($facebook_id, $name)
            break;

        case 'login':
            require_once '../login/login.php';

            $facebook_id = $_POST['facebook_id'];

            Login($facebook_id);
            break;

        case 'addWatchlist':
            require_once '../watchlist/add_watchlist.php';

            $id = $_POST['id'];
            $account_id = $_POST['account_id'];

            AddWatchlist($account_id, $id);
            break;

        case 'isWatchlist':
            require_once '../watchlist/is_watchlist.php';

            $politician_id = $_POST['politician_id'];
            $account_id = $_POST['account_id'];

            IsWatchlist($politician_id, $account_id);
            break;

        case 'retrieveMyWatchlist':
            require_once '../watchlist/retrieve_my_watchlist.php';

            $account_id = $_POST['account_id'];

            RetrieveMyWatchlist($politician_id, $account_id);
            break;

        case 'retrieveMyWatchlistSearch':
            require_once '../watchlist/retrieve_my_watchlist_search.php';

            $name = $_POST['name'];
            $account_id = $_POST['account_id'];

            RetrieveMyWatchlistSearch($name, $account_id);
            break;

        case 'retrievePoliticiansWatchlist':
            require_once '../watchlist/retrieve_politicians_watchlist.php';

            $name = $_POST['name'];
            $account_id = $_POST['account_id'];

            RetrievePoliticiansWatchlist($politician_id, $account_id);
            break;

        case 'addContact':
            require_once '../network/add_contact.php';

            $account_id1 = $_POST['account_id1'];
            $account_id2 = $_POST['account_id2'];

            AddContact($account_id1, $account_id2);
            break;

        case 'isContact':
            require_once '../network/is_contact.php';

            $session_id = $_POST['session_id'];
            $account_id = $_POST['account_id'];

            IsContact($session_id, $account_id);
            break;

        case 'retrieveAccountProfile':
            require_once '../network/retrieve_account_profile.php';

            $id = $_POST['id'];

            RetrieveAccountProfile($id);
            break;

        case 'retrieveContactCount':
            require_once '../network/retrieve_contact_count.php';

            $account_id = $_POST['account_id'];

            RetrieveContactCount($account_id);
            break;

        case 'retrieveContacts':
            require_once '../network/retrieve_contacts.php';

            $name = $_POST['name'];
            $account_id = $_POST['account_id'];

            RetrieceContacts($name, $account_id);
            break;

        case 'retrieveMyContacts':
            require_once '../network/retrieve_my_contacts.php';

            $account_id = $_POST['account_id'];

            RetrieveMyContacts($account_id);
            break;

        case 'ratePolitician':
            require_once '../politician/rate_politician.php';

            $rating = $_POST['rating'];
            $account_id = $_POST['account_id'];
            $politician_id = $_POST['politician_id'];

            RatePolitician($rating, $account_id, $politician_id);
            break;

        case 'editWikiProfile':
            require_once '../politician/edit_wikiprofile.php';

            $details = $_POST['details'];
            $category = $_POST['category'];
            $account_id = $_POST['account_id'];
            $politician_id = $_POST['politician_id'];
            EditWikiProfile($politician_id, $account_id, $category, $details);
            break;

        case 'getRatings':
            require_once '../politician/get_ratings.php';

            $account_id = $_POST['account_id'];
            $politician_id = $_POST['politician_id'];

            GetRatings($account_id, $politician_id);
            break;

        case 'randomPolitician':
            require_once '../politician/random_politician.php';

            RandomPolitician();
            break;

        case 'retrieveAllPoliticians':
            require_once '../politician/retrieve_all_politicians.php';

            RetrieveAllPoliticians();
            break;

        case 'retrievePoliticianProfile':
            require_once '../politician/retrieve_politician_profile.php';

            $id = $_POST['id'];

            RetrievePoliticianProfile($id);
            break;

        case 'retrievePoliticians':
            require_once '../politician/retrieve_politicians.php';

            $name = $_POST['name'];
            $position = $_POST['position'];
            $city = $_POST['city'];
            $province = $_POST['province'];

            RetrievePoliticians($name, $position, $city, $province);
            break;

        case 'retrieveWikiProfile':
            require_once '../politician/retrieve_wikiprofile.php';

            $politician_id = $_POST['politician_id'];
            $category = $_POST['category'];

            RetrieveWikiProfile($politician_id, $category);
            break;

        case 'semiLock':
            require_once '../politician/semi_lock.php';

            $account_id = $_POST['account_id'];
            $politician_profile_id = $_POST['politician_profile_id'];

            SemiLock($account_id, $politician_profile_id);
            break;

        case 'demandCount':
            require_once '../wikip/demand_count.php';

            $wikip_id = $_POST['wikip_id'];

            DemandCount($wikip_id);
            break;

        case 'insertQuestion':
            require_once '../wikip/insert_question.php';

            $caption = $_POST['caption'];
            $politician_id = $_POST['politician_id'];
            $account_id = $_POST['account_id'];

            InsertQuestion($caption, $politician_id, $account_id);
            break;

        case 'insertWikip':
            require_once '../wikip/insert_wikip.php';

            $url = $_POST['url'];
            $caption = $_POST['caption'];
            $politician_id = $_POST['politician_id'];
            $account_id = $_POST['account_id'];

            InsertWikip($url, $caption, $politician_id, $account_id);
            break;

        case 'insertWikiPork':
            require_once '../wikip/insert_wikipork.php';

            $url = $_POST['url'];
            $caption = $_POST['caption'];
            $politician_id = $_POST['politician_id'];
            $account_id = $_POST['account_id'];
            $promise_id = $_POST['promise_id'];

            InsertQuestion($url, $caption, $politician_id, $account_id, $promise_id);
            break;

        case 'deleteWikip':
            require_once '../wikip/delete_wikip.php';

            $wikip_id = $_POST['wikip_id'];

            DeleteWikip($wikip_id);
            break;

        case 'retrieveOneWikip':
            require_once '../wikip/retrieve_one_wikip.php';

            $wikip_id = $_POST['wikip_id'];

            RetrieveOneWikip($wikip_id);
            break;

        case 'retrieveQuestionsAnswers':
            require_once '../wikip/retrieve_questions_answers.php';

            $politician_id = $_POST['politician_id'];

            RetrieveQuestionsAnswers($wikip_id);
            break;

        case 'retrieveWikipCount':
            require_once '../wikip/retrieve_wikip_count.php';

            $account_id = $_POST['account_id'];

            RetrieveWikiPCount($account_id);
            break;

        case 'retrieveWikipFromAccount':
            require_once '../wikip/retrieve_wikip_from_account.php';

            $account_id = $_POST['account_id'];

            RetrieveWikiPFromAccount($account_id);
            break;

        case 'retrieveWikipFromPolitician':
            require_once '../wikip/retrieve_wikip_from_politician.php';

            $politician_id = $_POST['politician_id'];

            RetrieveWikiPFromPolitician($politician_id);
            break;

        case 'retrieveWikips':
            require_once '../wikip/retrieve_wikips.php';

            $last_timestamp = $_POST['last_timestamp'];
            $account_id = $_POST['account_id'];

            RetrieveWikiPs($last_timestamp, $account_id);
            break;

        case 'isDemanded':
            require_once '../wikip/is_demanded.php';

            $wikip_id = $_POST['wikip_id'];
            $account_id = $_POST['account_id'];

            IsDemanded($wikip_id, $account_id);
            break;

        case 'incrementDemandQuestion':
            require_once '../wikip/increment_demand_question.php';

            $wikip_id = $_POST['wikip_id'];
            $account_id = $_POST['account_id'];
            IncrementDemandQuestion($wikip_id, $account_id);
            break;

        case 'getPromises':
            require_once '../promise/get_promises.php';

            $account_id = $_POST['account_id'];
            GetPromises($account_id);
            break;

        case 'insertPromise':
            require_once '../promise/insert_promise.php';

            $politician_id = $_POST['politician_id'];
            $name = $_POST['name'];
            $details = $_POST['details'];
            $sources = $_POST['sources'];
            TrackPromise($politician_id, $name, $details, $sources);
            break;

        case 'pdafWatch':
            require_once '../promise/pdaf_watch.php';

            PdafWatch();
            break;

        case 'promiseCounts':
            require_once '../promise/promise_counts.php';

            $account_id = $_POST['account_id'];
            $promise_id = $_POST['promise_id'];
            PromiseCounts($account_id, $promise_id);
            break;

        case 'retrieveOnePromise':
            require_once '../promise/retrieve_one_promise.php';

            $promise_id = $_POST['promise_id'];
            RetrieveOnePromise($promise_id);
            break;

        case 'retrieveProjects':
            require_once '../promise/retrieve_projects.php';

            $politician_id = $_POST['politician_id'];
            RetrieveProjects($politician_id);
            break;

        case 'retrievePromises':
            require_once '../promise/retrieve_promises.php';

            $politician_id = $_POST['politician_id'];
            RetrievePromises($politician_id);
            break;

        case 'trackPromise':
            require_once '../promise/track_promise.php';

            $status = $_POST['status'];
            $account_id = $_POST['account_id'];
            $promise_id = $_POST['promise_id'];
            TrackPromise($status, $account_id, $promise_id);
            break;

        case 'incrementShareCount':
            require_once '../tambayan/increment_share_count.php';

            $wikip_id = $_POST['wikip_id'];
            IncrementShareCount($wikip_id);
            break;

        case 'retrieveNews':
            require_once '../tambayan/retrieve_news.php';

            RetrieveNews();
            break;

        case 'retrieveTrendingQuestions':
            require_once '../tambayan/retrieve_trending_questions.php';

            RetrieveTrendingQuestions();
            break;

        case 'retrieveTrendingWikips':
            require_once '../tambayan/retrieve_trending_wikips.php';

            $wikip_id = $_POST['wikip_id'];
            RetrieveTrendingWikips();
            break;
    }
}
?>