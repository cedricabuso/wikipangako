<?php
require_once 'global.php';
require_once 'politician/modules/project/retrieve_projects.php';

function Project(){
    echo '
        <div id="network-container" class="newsfeed">
            <h4>Add a project</h4> <hr class="watch-top">
            <div id="search-network" class="input-append">
                <form name="add-project" method="post" action="">
                    <input name="title" type="text" placeholder="Insert project title..." /><br/>
					<textarea name="details" placeholder="Insert project details..." /></textarea><br/>
                    <button name="submit" class="btn add-on">Submit</button>
                </form>
            </div>
            <br>';            

	if(isset($_POST['submit'])){
		require_once 'politician/modules/project/add_project.php';
		AddProject($_POST['title'], $_POST['details'], $_SESSION['politician_id']);		
		echo 'Successfully added project';
	}
	
    $data = RetrieveProjects($_SESSION['politician_id']);
    echo '<div class="my-watchlist">
            <h4>My Projects</h4>';
    if($data){
        foreach ($data as $key) {
            echo '  <div>
                        <h3>' . $key['name'] . '</h3>
						<p>' . $key['details'] . '</p>
                    </div><br/><br/>';
        }
    }

    echo'</div>
    </div>';
}
?>