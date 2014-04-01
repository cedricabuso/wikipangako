<?php
require_once 'global.php';

function Donate(){
    global $facebook;

    echo '
        <div class="newsfeed">
            <h2 style="margin-top: -35px;"><img style="padding-top: 35px;padding-bottom: 30px; padding-right: 20px;width: 75px;" src="img/wpcons/donateicon.png"/>Donate</h2>
            <hr style="margin-top: -30px;">
            <div>
                <p style="font-size: 16px;">
                    <img class="pull-right" style="width: 290px;margin-top: -20px;" src="img/wpcons/donateicon.png"/>
                    <b>Wikipangako</b> is managed by <b>Wikipangako Inc.</b>, a non-profit organization registered under the Securities and Exchange Commission, Philippines. Wikipangako is an initiative of young Filipinos who believe that social and political change are possible.<br><br>
                    As an online platform, we use resources such as servers and manpower to keep up our site one click away from you so that our goal of holding every Filipino accountable runs 24/7. And unlike other websites, we do not intend to pay up our costs by putting up advertisements.<br><br>
                    And so, if you\'re interested in helping us financially, please feel free to make either a one-time donation by clicking the <b>DONATE</b> button below, or if you feel like being more generous, start making your monthly donations by clicking the <b>SUBSCRIBE</b> button.<br><br>
                    For any questions such as how we use your donation and the like, please don\'t hesitate to email us at <b>donations@wikipangako.com</b>.
                </p>
                <br><br>
                <center>
                    <div class="pull-left">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="P9BJQ8AY2JCD4">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>

                    <div class="pull-left" style="margin-left: 40px;">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="BLKMDBLP99XN4">
                            <input type="hidden" name="currency_code" value="PHP">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" class="pull-left">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            <input type="hidden" name="on0" value="Monthly Donations">
                            <b style="font-size: 16px;">Monthly Donations: </b>
                            <select name="os0" style="margin-bottom:0px;">
                                <option value="President of Awesomeness">President of Awesomeness : P1,000.00 PHP - monthly</option>
                                <option value="Enforcer of Change">Enforcer of Change : P500.00 PHP - monthly</option>
                                <option value="Catalyst of Progress">Catalyst of Progress : P100.00 PHP - monthly</option>
                            </select>
                        </form>
                    </div>
                </center>
            </div>
        </div>';
}
?>