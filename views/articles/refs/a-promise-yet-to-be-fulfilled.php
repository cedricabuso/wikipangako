<?php
require_once 'global.php';

function Article2(){
    global $facebook;

    return '
        <script>$(document).attr("title", "A promise yet to be fulfilled");</script>
        <div class="newsfeed">
            <div style="display: inline-block;">
                <p class="pull-left" style="margin:0px;">
                    <b style="font-size: 20px;">A promise yet to be fulfilled</b><br>
                    <span style="font-size: 18px;">By Ernest Francis R. Calayag<br>
                    @ernestcalayag<br>
                    Posted on March 6, 2014</span><br><br>
                </p>
                <img class="pull-right" style="width: 300px;padding-right: 20px;padding-left: 5px;margin-top:120px;" src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-frc3/t1/1239657_819343321414825_1475502506_n.jpg"/>
                <p style="font-size: 16px;margin-top:120px;">
                    This article was originally published on the Philippine Daily Inquirer on September 9, 2012. You may read the original article on the PDI site <a href="http://opinion.inquirer.net/36386/a-promise-yet-to-be-fulfilled" target="_blank">HERE</a><br><br>
                    In an April 26, 2010 Inquirer article, “Higher education budget under LP, says Roxas,” a candidate for vice president, who is now the interior secretary, said that if he and his running mate, candidate-for-president Benigno “Noynoy” Aquino III won the 2010 elections, they would increase the budget for education by up to 5-6 percent of the country’s gross domestic product.<br><br>
                    A few days from now, the appropriation for education will be deliberated in Congress. While there is a remarkable increase in the education budget, the education allocation proposed by the Department of Budget and Management for 2013 is a far cry from the 5-6-percent commitment made by candidate Roxas two years ago.<br><br>
                    However, simple logic explains why only 2-3 percent of the GDP has been allotted for education for the past fiscal years: the 5-6 percent appropriation promised for education was made on the assumption that both candidates, Aquino and Roxas, would win. Given that only one-half of the Noy-Mar tandem won, it stands to reason that only half of the promised 5-6 percent allocation would be considered due.<br><br>
                    Kidding aside, we emphasize two points: First, the national government’s allotment for education is reflective of its priorities and thus the government is clearly not investing that much—5-6 percent of the GDP—in the Filipino youth, as promised by candidate Roxas. Since the international recognition in 1996 of the Unesco Delors standard, where 6 percent of the national income must be allocated for education, the Philippines has consistently not been meeting the ideal spending for education. Second, politicians will always be politicians. They will try to please you by saying things you want to hear and showing you things you want to see. But they will never deliver their end of the bargain; thus, it is necessary on our part to demand accountability.<br><br>
                    With the coming midterm elections, more promises will be made, and with the remaining four years of the current administration, it is but logical to demand from its officials basic social services and to make sure that what they promise on the campaign trail they will turn into reality that, ultimately, will be felt by the people.
            </div>
            <div style="line-height: 9px;" class="fb-share-button" data-href="http://www.wikipangako.com/?read_only=1&amp;main=articles&amp;refs=a-promise-yet-to-be-fulfilled" data-type="box_count"></div>
            <a href="http://www.wikipangako.com/?read_only=1&amp;main=articles&amp;refs=a-promise-yet-to-be-fulfilled" class="twitter-share-button" data-via="wikipangako" data-lang="en" data-count="vertical">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>';
}
?>