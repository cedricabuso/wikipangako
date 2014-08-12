<?php
require_once 'global.php';

function OurPartners(){
    global $facebook;

    echo '
        <div class="newsfeed">
            <h1>Our Partners</h1><br>
            <div>
                <img src="img/wpcons/catalyst.jpg" class="pull-left" style="width:150px;"/>
                <h4 style="margin-left: 160px;">
                    <b>Cat@lyst</b> is a <b>T@ttoo</b> branded initiative that seeks to harness creativity, energy and technology to create change and empower the youth to make a difference in society. 
                    In collaboration with Globe Bridging Communities, and the Global Shapers Manila, the CSR initiative will involve a youth challenge that will award cash grants, mentorship, 
                    and ICT support to see through the ideation, distillation and incubation of technology-based innovations useful to catalyze change in local communities.
                    Visit <a href="http://www.catalyst.com.ph" target="_blank">www.catalyst.com.ph</a> to find out more.
                </h4>
                <br>
                <img src="img/wpcons/global.jpg" class="pull-left" style="width:150px;"/>
                <h4 style="margin-left: 160px;">
                    The <b>Global Shapers Community</b> is a network of city-based Hubs developed and led by young leaders between 20 and 30 years old who want to develop 
                    their leadership potential towards serving society. To that end, Hubs undertake local projects to improve their communities.
                    To learn more about the global shapers, visit <a href="http://www.globalshapers.org/" target="_blank">http://www.globalshapers.org/</a>.
                </h4>
                <br><br><br><br>
                <img src="img/wpcons/tattoo.jpg" class="pull-left" style="width:150px;"/>
                <h4 style="margin-left: 160px;">
                    <b>Globe</b> is a leading telecommunications company in the Philippines. Our mission is to transform and enrich lives through communications by way of our vision of making great things possible.
                    Visit <a href="http://tattoo.globe.com.ph/" target="_blank">http://tattoo.globe.com.ph/</a> to find out more about Globe Tattoo.

                </h4>
            </div>
        </div>';
}
?>