<?php
require_once 'global.php';

function About(){
    global $facebook;

    echo '
        <div class="newsfeed">
            <h1>About WikiPangako</h1>
            <div>
                <p style="font-size: 16px;">
                    <img class="pull-left" style="width: 290px;padding-right: 20px;" src="img/wpcons/about.png"/>
                    <b>WikiPangako is an online good governance platform that aims to empower the citizens in holding our elected officials accountable by crowd-sourcing reports, promises and profiles about our leaders.</b><br><br>
                    Imagine Wikipedia, Facebook and a citizen journalism website rolled into one and having it all focus on our elected officials, that’s what our site is all about. We want to give all WikiPangako users an online one stop platform where they can know our elected official better, monitor how they are performing in their offices, and hold them accountable with the promises they have given not only during the campaign season, but every time they give one.<br><br>
                    All our content is crowd-sourced, which means that you have the control on how our elected official will look like on our site, <b><i>provided</i></b> that what you contribute is truthful and relevant. And you, yes you, can rate how our leaders are performing by up voting or down voting them on their profile pages and expressing your thoughts whether you think their promises were accomplished, still in progress or sadly, “napako”. <br><br>
                    Wikipangako, neither the platform nor the team managing it, does not promise to solve the political crisis in our country. On its own, it will never remove the corrupt and the unresponsive officials off their political powers and give way for the progressive ones an advantage to win the elections. It will never reach out all the citizens and invite them to understand what is happening in our country. Wikipangako will never bring food on the tables of the poor nor assure social services for those who are in need.<br><br>
                    What we can promise you is that in a society where elite politics exist and where the citizens are generally alienated from the government, we will stand as the first step in bringing about a political revolution closer. We shall function as a conduit of information on how our leaders are performing and help you assess on who to give the mandate of leading our country. We will provide you information, which in turn, you can share to your families and friends. We will let you speak out about the services and disservice you experience and show our leaders realities which they might have overseen.<br><br>
                    Wikipangako is just the first step, everything that will happen next is up to you and the collective you choose to be a part of.
                </p>
            </div>
        </div>';
}
?>