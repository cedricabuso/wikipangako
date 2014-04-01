<?php
//
//  increment_share_count.php
//  WikiPangako
//
//  Created by Reuel Carlo Virtucio on 11/9/13.
//  Copyright (c) 2013 Reuel Carlo Virtucio. All rights reserved.
//
function IncrementStatsCount($id, $stats, $type){
	global $database;
    if($database==null)
        Connect();

    if($type=='wikip'){
		if($stats=='share')
			$database->query("UPDATE WIKIP SET share_count=share_count+1 WHERE wikip_id=".$id);
		else if($stats=='tweet')
			$database->query("UPDATE WIKIP SET tweet_count=tweet_count+1 WHERE wikip_id=".$id);
	}else if($type=='promise'){
		if($stats=='share')
			$database->query("UPDATE PROMISE SET share_count=share_count+1 WHERE promise_id=".$id);
		else if($stats=='tweet')
			$database->query("UPDATE PROMISE SET tweet_count=tweet_count+1 WHERE promise_id=".$id);
	}else if($type=='politician'){
		if($stats=='share')
			$database->query("UPDATE POLITICIAN SET share_count=share_count+1 WHERE politician_id=".$id);
		else if($stats=='tweet')
			$database->query("UPDATE POLITICIAN SET tweet_count=tweet_count+1 WHERE politician_id=".$id);
	}
}

?>