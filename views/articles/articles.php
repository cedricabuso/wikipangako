<?php
require_once 'global.php';

function Articles(){
    global $facebook;

    if(isset($_GET['refs'])) {
        switch ($_GET['refs']) {
            case 'an-idea-whose-time-has-come': require_once 'refs/an-idea-whose-time-has-come.php'; echo Article1(); break;
            case 'a-promise-yet-to-be-fulfilled': require_once 'refs/a-promise-yet-to-be-fulfilled.php'; echo Article2(); break;
        }
    } else 
    echo '
        <div class="newsfeed">
            <h2>Articles</h2>
            <div style="display: inline-block;">
                <img class="pull-left" style="width: 150px;padding-right: 20px;padding-left: 5px;" src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-prn1/t1/1948240_819343298081494_1524329200_n.jpg"/>
                <p style="font-size: 16px;margin-left: 175px;">
                    <b style="font-size: 20px;">An idea whose time has come</b><br><br>
                    by <b>ANNA OPOSA on March 6, 2014</b><br><br>                    
                    Wiki” is a Hawaiian word that means “very quick.” The name WikiPangako carries two meanings: a platform that provides quick access to promises that politicians made, and a list of quick promises that politicians made as part .....<br><br>
                    <a href="?main=articles&refs=an-idea-whose-time-has-come" style="color:#f27441;"><b>READ MORE</b></a>
                </p>
            </div>
            <br><br>
            <div style="display: inline-block;">
                <img class="pull-left" style="width: 150px;padding-right: 20px;" src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-frc3/t1/1239657_819343321414825_1475502506_n.jpg"/>
                <p style="font-size: 16px;margin-left: 170px;">
                    <b style="font-size: 20px;">A promise yet to be fulfilled</b><br><br>
                    by <b>ERNEST FRANCIS R. CALAYAG on March 6, 2014</b><br><br>
                    In an April 26, 2010 Inquirer article, “Higher education budget under LP, says Roxas,” a candidate for vice president, who is now the interior secretary, said that if he and his running mate, candidate-for-president Benigno “Noynoy” Aquino III won the 2010 elections ....<br><br>
                    <a href="?main=articles&refs=a-promise-yet-to-be-fulfilled" style="color:#f27441;"><b>READ MORE</b></a>
                </p>
            </div>
        </div>';
}
?>