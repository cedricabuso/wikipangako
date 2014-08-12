<?php
require_once 'global.php';

function Article1(){
    global $facebook;

    return '
        <script>$(document).attr("title", "An idea whose time has come");</script>
        <div class="newsfeed">
            <div style="display: inline-block;">
                <p class="pull-left" style="margin:0px;">
                    <b style="font-size: 20px;">An idea whose time has come</b><br>
                    <span style="font-size: 18px;">By Anna Oposa<br>
                    @annaoposa<br>
                    Posted on March 6, 2014</span><br><br>
                </p>
                <img class="pull-left" style="width: 300px;padding-right: 20px;padding-left: 5px;margin-left: -265px;margin-top: 120px;" src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-prn1/t1/1948240_819343298081494_1524329200_n.jpg"/>
                <p style="font-size: 16px;margin-top: 115px;">
                    “Wiki” is a Hawaiian word that means “very quick.” The name WikiPangako carries two meanings: a platform that provides quick access to promises that politicians made, and a list of quick promises that politicians made as part of their platform.<br><br>
                    We were and continue to be inspired by founder Ernest Calayag’s vision and determination to get WikiPangako going. The Global Shapers learned that it was something he wanted to do even before Cat@lyst, and we are thrilled to be helping him bring his dream to life. He and his team prove that the youth is not wasted on the young. <br><br>
                    During the selection process for Cat@lyst, the concept of WikiPangako resonated with all of the Global Shapers. We just had the 2013 national elections then, and were feeling hopeful and frustrated with the plans and promises of the candidates. We’ve heard them many times before: better business and employment opportunities, increased healthcare benefits, a cleaner environment, a more efficient public transportation system, higher budget for education, and a transparent government. Same keywords, often said by the same surnames across generations.<br><br>
                    While we, the civil society, see and feel that our country has made a few steps forward and a few more back, we’ve never had a go-to tool that offers a snapshot of how many of those plans have been accomplished, or if there have even been attempts to. WikiPangako serves as a venue to do that and more—it empowers citizens to play a bigger role in holding these supposed public servants more accountable to their promises and to the Filipino people. It offers a report card of sorts when campaign season begins. And, albeit indirectly, it also shows potential areas for collaboration between and among civil society, the private sector, and the government. It can help us identify gaps, and then make that gap a little bit smaller.<br><br>
                    Victor Hugo describes WikiPangako best when he said, “All the forces in the world are not so powerful as an idea whose time has come.” We have no doubt that WikiPangako will be an asset to nation-building. There is a strong desire among Filipinos to demand for good governance. Our 7,107 islands deserve nothing less. <br><br>
                    <i style="color:#83807f">Anna R. Oposa is a multi-hyphenated changemaker. She is a freelance writer, public speaker, PADI Rescue Diver, and environmental advocate. Anna is the co-founder and Chief Mermaid of Save Philippine Seas, a movement to protect the world’s richest marine resources by harnessing the power of social media and lobbying for the enforcement of environmental laws. She is also the Curator of the World Economic Forum’s Global Shapers Manila Hub Follow her adventures and misadventures at http://annaoposa.ph and @annaoposa.</i>
                </p>
            </div>
            <div style="line-height: 9px;" class="fb-share-button" data-href="http://www.wikipangako.com/?read_only=1&amp;main=articles&amp;refs=an-idea-whose-time-has-come" data-type="box_count"></div>
            <a href="http://www.wikipangako.com/?read_only=1&amp;main=articles&amp;refs=an-idea-whose-time-has-come" class="twitter-share-button" data-via="wikipangako" data-lang="en" data-count="vertical">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>';
}
?>