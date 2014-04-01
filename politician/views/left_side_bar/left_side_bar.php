<?php
require_once 'global.php';

function LeftSideBar(){
    echo '
        <div class="left-bar pull-left">            
            <div class="nav-links">
                <ul class="nav nav-tabs nav-stacked">  
                    <li><a href="?main=home&inner=project"><i class="icon-user icon-large"></i> Add Projects <span class="arrow pull-right">></span></a></li>
                    <li><a href="?main=home&inner=answer"><i class="icon-bullhorn icon-large"></i> Answer Questions <span class="arrow pull-right">></span></a></li>
                </ul>  
            </div>
        </div>
    ';
}
?>