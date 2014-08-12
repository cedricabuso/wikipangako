<?php
if(isset($_GET['action'])){
    require_once '../../../database.php';

    $action = $_GET['action'];

    switch ($action) {
        case 'registerFacebook':
            require_once '../register/register_facebook.php';

            $facebook_id = $_GET['facebook_id'];
            $name = $_GET['name'];

            echo RegisterFacebook($facebook_id, $name);
            break;

        case 'login':
            require_once '../login/login.php';

            $facebook_id = $_GET['facebook_id'];

            echo Login($facebook_id);
            break;

        case 'addWatchlist':
            require_once '../watchlist/add_watchlist.php';

            $id = $_GET['id'];
            $account_id = $_GET['account_id'];

            AddWatchlist($account_id, $id);
            break;

        case 'isWatchlist':
            require_once '../watchlist/is_watchlist.php';

            $politician_id = $_GET['politician_id'];
            $account_id = $_GET['account_id'];

            echo IsWatchlist($politician_id, $account_id);
            break;

        case 'retrieveMyWatchlist':
            require_once '../watchlist/retrieve_my_watchlist.php';

            $account_id = $_GET['account_id'];

            echo RetrieveMyWatchlist($account_id);
            break;

        case 'retrieveMyWatchlistSearch':
            require_once '../watchlist/retrieve_my_watchlist_search.php';

            $name = $_GET['name'];
            $account_id = $_GET['account_id'];

            echo RetrieveMyWatchlistSearch($name, $account_id);
            break;

        case 'retrievePoliticiansWatchlist':
            require_once '../watchlist/retrieve_politicians_watchlist.php';

            $name = $_GET['name'];
            $account_id = $_GET['account_id'];

            echo RetrievePoliticiansWatchlist($politician_id, $account_id);
            break;

        case 'addContact':
            require_once '../network/add_contact.php';

            $account_id1 = $_GET['account_id1'];
            $account_id2 = $_GET['account_id2'];

            AddContact($account_id1, $account_id2);
            break;

        case 'isContact':
            require_once '../network/is_contact.php';

            $session_id = $_GET['session_id'];
            $account_id = $_GET['account_id'];

            echo IsContact($session_id, $account_id);
            break;

        case 'contactRequest':
            require_once '../network/contact_request.php';

            $account_id = $_GET['account_id'];

            echo ContactRequest($account_id);
            break;

        case 'privateContact':
            require_once '../network/private_contact.php';

            $account_id1 = $_GET['account_id1'];
            $account_id2 = $_GET['account_id2'];

            echo PrivateContact($account_id1, $account_id2);
            break;
		
		case 'searchContact':
			require_once '../network/search_contact.php';

            $name = $_GET['name'];

            SearchContact($name);
            break;

        case 'retrieveAccountProfile':
            require_once '../network/retrieve_account_profile.php';

            $id = $_GET['id'];

            echo RetrieveAccountProfile($id);
            break;

        case 'retrieveContactCount':
            require_once '../network/retrieve_contact_count.php';

            $account_id = $_GET['account_id'];

            echo RetrieveContactCount($account_id);
            break;

        case 'retrieveContacts':
            require_once '../network/retrieve_contacts.php';

            $name = $_GET['name'];
            $account_id = $_GET['account_id'];

            echo RetrieveContacts($name, $account_id);
            break;

        case 'retrieveMyContacts':
            require_once '../network/retrieve_my_contacts.php';

            $name = $_GET['name'];
            $account_id = $_GET['account_id'];

            echo RetrieveMyContacts($name, $account_id);
            break;

        case 'ratePolitician':
            require_once '../politician/rate_politician.php';

            $rating = $_GET['rating'];
            $account_id = $_GET['account_id'];
            $politician_id = $_GET['politician_id'];

            RatePolitician($rating, $account_id, $politician_id);
            break;

        case 'editWikiProfile':
            require_once '../politician/edit_wikiprofile.php';

            $details = $_GET['details'];
            $category = $_GET['category'];
            $account_id = $_GET['account_id'];
            $politician_id = $_GET['politician_id'];
            EditWikiProfile($politician_id, $account_id, $category, $details);
            break;

        case 'getRatings':
            require_once '../politician/get_ratings.php';

            $account_id = $_GET['account_id'];
            $politician_id = $_GET['politician_id'];

            echo GetRatings($account_id, $politician_id);
            break;

        case 'randomPolitician':
            require_once '../politician/random_politician.php';

            echo RandomPolitician();
            break;

        case 'retrieveAllPoliticians':
            require_once '../politician/retrieve_all_politicians.php';

            echo RetrieveAllPoliticians();
            break;

        case 'retrievePoliticianProfile':
            require_once '../politician/retrieve_politician_profile.php';

            $id = $_GET['id'];

            echo RetrievePoliticianProfile($id);
            break;

        case 'retrievePoliticians':
            require_once '../politician/retrieve_politicians.php';

            $term = $_GET['term'];

            echo RetrievePoliticians($term);
            break;

        case 'retrieveWikiProfile':
            require_once '../politician/retrieve_wikiprofile.php';

            $politician_id = $_GET['politician_id'];
            $category = $_GET['category'];

            echo RetrieveWikiProfile($politician_id, $category);
            break;

        case 'semiLock':
            require_once '../politician/semi_lock.php';

            $account_id = $_GET['account_id'];
            $politician_profile_id = $_GET['politician_profile_id'];

            SemiLock($account_id, $politician_profile_id);
            break;

        case 'demandCount':
            require_once '../wikip/demand_count.php';

            $wikip_id = $_GET['wikip_id'];

            echo DemandCount($wikip_id);
            break;

        case 'insertQuestion':
            require_once '../wikip/insert_question.php';

            $caption = $_GET['caption'];
            $politician_id = $_GET['politician_id'];
            $account_id = $_GET['account_id'];

            InsertQuestion($caption, $politician_id, $account_id);
            break;

        case 'insertWikip':
            require_once '../wikip/insert_wikip.php';

            $url = $_GET['url'];
            $caption = $_GET['caption'];
            $politician_id = $_GET['politician_id'];
            $account_id = $_GET['account_id'];

            InsertWikip($url, $caption, $politician_id, $account_id);
            break;

        case 'insertWikiPork':
            require_once '../wikip/insert_wikipork.php';

            $url = $_GET['url'];
            $caption = $_GET['caption'];
            $politician_id = $_GET['politician_id'];
            $account_id = $_GET['account_id'];
            $promise_id = $_GET['promise_id'];

            InsertQuestion($url, $caption, $politician_id, $account_id, $promise_id);
            break;

        case 'deleteWikip':
            require_once '../wikip/delete_wikip.php';

            $wikip_id = $_GET['wikip_id'];

            DeleteWikip($wikip_id);
            break;

        case 'retrieveOneWikip':
            require_once '../wikip/retrieve_one_wikip.php';

            $wikip_id = $_GET['wikip_id'];

            echo RetrieveOneWikip($wikip_id);
            break;

        case 'retrieveQuestionsAnswers':
            require_once '../wikip/retrieve_questions_answers.php';

            $politician_id = $_GET['politician_id'];

            echo RetrieveQuestionsAnswers($wikip_id);
            break;

        case 'retrieveWikipCount':
            require_once '../wikip/retrieve_wikip_count.php';

            $account_id = $_GET['account_id'];

            echo RetrieveWikiPCount($account_id);
            break;

        case 'retrieveWikipFromAccount':
            require_once '../wikip/retrieve_wikip_from_account.php';

            $account_id = $_GET['account_id'];

            echo RetrieveWikiPFromAccount($account_id);
            break;

        case 'retrieveWikipFromPolitician':
            require_once '../wikip/retrieve_wikip_from_politician.php';

            $politician_id = $_GET['politician_id'];

            echo RetrieveWikiPFromPolitician($politician_id);
            break;

        case 'retrieveWikips':
            require_once '../wikip/retrieve_wikips.php';

            $last_timestamp = $_GET['last_timestamp'];
            $account_id = $_GET['account_id'];

            echo RetrieveWikiPs($last_timestamp, $account_id);
            break;

        case 'retrieveWikipsLazy':
            require_once '../wikip/retrieve_wikips_lazy.php';

            $account_id = $_GET['account_id'];
            $last_timestamp = $_GET['last_timestamp'];

            RetrieveWikipsLazy($last_timestamp, $account_id);
            break;

        case 'isDemanded':
            require_once '../wikip/is_demanded.php';

            $wikip_id = $_GET['wikip_id'];
            $account_id = $_GET['account_id'];

            echo IsDemanded($wikip_id, $account_id);
            break;

        case 'incrementDemandQuestion':
            require_once '../wikip/increment_demand_question.php';

            $wikip_id = $_GET['wikip_id'];
            $account_id = $_GET['account_id'];
            IncrementDemandQuestion($wikip_id, $account_id);
            break;

        case 'getPromises':
            require_once '../promise/get_promises.php';

            $account_id = $_GET['account_id'];
            echo GetPromises($account_id);
            break;

        case 'insertPromise':
            require_once '../promise/insert_promise.php';

            $politician_id = $_GET['politician_id'];
            $name = $_GET['name'];
            $details = $_GET['details'];
            $sources = $_GET['sources'];
            $category = $_GET['category'];
            InsertPromise($politician_id, $name, $details, $sources. $category);
            break;

        case 'pdafWatch':
            require_once '../promise/pdaf_watch.php';

            echo PdafWatch();
            break;

        case 'promiseCounts':
            require_once '../promise/promise_counts.php';

            $account_id = $_GET['account_id'];
            $promise_id = $_GET['promise_id'];
            echo PromiseCounts($account_id, $promise_id);
            break;

        case 'retrieveOnePromise':
            require_once '../promise/retrieve_one_promise.php';

            $promise_id = $_GET['promise_id'];
            echo RetrieveOnePromise($promise_id);
            break;

        case 'retrieveProjects':
            require_once '../promise/retrieve_projects.php';

            $politician_id = $_GET['politician_id'];
            echo RetrieveProjects($politician_id);
            break;

        case 'retrievePromises':
            require_once '../promise/retrieve_promises.php';

            $politician_id = $_GET['politician_id'];
            echo RetrievePromises($politician_id);
            break;

        case 'trackPromise':
            require_once '../promise/track_promise.php';

            $status = $_GET['status'];
            $account_id = $_GET['account_id'];
            $promise_id = $_GET['promise_id'];
            TrackPromise($status, $account_id, $promise_id);
            break;

        case 'incrementStatsCount':
            require_once '../tambayan/increment_stats_count.php';

            $id = $_GET['id'];
            $stats = $_GET['stats'];
            $type = $_GET['type'];
            IncrementStatsCount($id, $stats, $type);
            break;

        case 'retrieveNews':
            require_once '../tambayan/retrieve_news.php';

            echo RetrieveNews();
            break;

        case 'retrieveTrendingQuestions':
            require_once '../tambayan/retrieve_trending_questions.php';

            echo RetrieveTrendingQuestions();
            break;

        case 'retrieveTrendingWikips':
            require_once '../tambayan/retrieve_trending_wikips.php';

            echo RetrieveTrendingWikips();
            break;

        case 'retrieveTrendingPoliticians':
            require_once '../tambayan/retrieve_trending_politicians.php';

            echo RetrieveTrendingPoliticians();
            break;

        case 'retrieveTrendingPromises':
            require_once '../tambayan/retrieve_trending_promises.php';

            echo RetrieveTrendingPromises();
            break;

        case 'isSeen':
            require_once '../notification/is_seen.php';

            $account_id = $_GET['account_id'];

            IsSeen($account_id);
            break;

        case 'getNotification':
            require_once '../notification/get_notification.php';

            $account_id = $_GET['account_id'];

            GetNotification($account_id);
            break;

        case 'accountState':
            require_once '../settings/account_state.php';

            $id = $_GET['id'];

            AccountState($id);
            break;

        case 'isSearchable':
            require_once '../settings/is_searchable.php';

            $id = $_GET['id'];

            IsSearchable($id);
            break;

        case 'searchable':
            require_once '../settings/searchable.php';

            $searchable = $_GET['searchable'];
            $id = $_GET['id'];

            Searchable($searchable, $id);
            break;

        case 'state':
            require_once '../settings/state.php';

            $state = $_GET['state'];
            $id = $_GET['id'];

            State($state, $id);
            break;
    }
}
?>