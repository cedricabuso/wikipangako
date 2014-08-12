<?php
require_once 'global.php';

function OurTeam(){
    global $facebook;

    echo '
        <div class="newsfeed">
            <h1>Our Team</h1><br>
            <div>
                <table>
                    <tr>
                        <td>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/ernest.png">
                                <span style="padding-left:5px;"><b>Ernest Francis R. Calayag</b></span><br>
                                <span style="padding-left:5px;">Founder & CEO</span>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="http://profile.ak.fbcdn.net/hprofile-ak-frc3/t1/c0.20.200.200/p200x200/10006341_818714858144338_299811746_n.jpg">
                                <span style="padding-left:5px;"><b>Ray Cedric Louis H. Abuso</b></span><br>
                                <span style="padding-left:5px;">Co-Founding Developer & Co-Lead Developer</span>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/carlo.png">
                                <span style="padding-left:5px;"><b>Reuel Carlo P. Virtucio</b></span><br>
                                <span style="padding-left:5px;">Co-Founding Developer & Co-Lead Developer</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/john.png">
                                <span style="padding-left:5px;"><b>John Lee Candelaria</b></span><br>
                                <span style="padding-left:5px;">Lead Researcher</span>
                            </div>
                        </td>
                        <td>
                            <br>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/fernan.png">
                                <span style="padding-left:5px;"><b>Fernan L. Talamayan</b></span><br>
                                <span style="padding-left:5px;">Communication Consultant</span>
                            </div>
                        </td>
                        <td>
                            <br>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/lara.png">
                                <span style="padding-left:5px;"><b>Alyssa Lara B. Garcia</b></span><br>
                                <span style="padding-left:5px;">Communication Consultant</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/yen.png">
                                <span style="padding-left:5px;"><b>Yen C. Parico</b></span><br>
                                <span style="padding-left:5px;">Communication Officer</span>
                            </div>
                        </td>
                        <td>
                            <br>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/mark.png">
                                <span style="padding-left:5px;"><b>Marc Ferdianand R. Polancos</b></span><br>
                                <span style="padding-left:5px;">Constituency and Membership Coordinator</span>
                            </div>
                        </td>
                        <td>
                            <br>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <img class="pic pull-left" src="img/ourteam/ezekiel.png">
                                <span style="padding-left:5px;"><b>Ezekiel Elmer R. Calayag</b></span><br>
                                <span style="padding-left:5px;">Technical Maintenance Officer</span>
                            </div>
                        </td>
                    </tr>
                </table>
                <br>
                <h2>Special thanks to:<h2>
                <table>
                    <tr>
                        <td>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <a href="http://www.facebook.com" target="_blank"><img width="250" class="pull-left" src="img/ourteam/face.png"></a>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <a href="http://www.wikipedia.org" target="_blank"><img width="250" class="pull-left" src="img/ourteam/wikipedia.png"></a>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;display: inline-block;padding: 5px;min-width: 260px;">
                                <a href="http://www.wearemovingthings.com" target="_blank"><img width="250" class="pull-left" src="img/ourteam/mtd.png">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>';
}
?>