!(function (){
    function addWatchlist(id, account_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'addWatchlist',
                id: id,
                account_id: account_id
            },
            function(){
                $('#'+id).html('Added to Watchlist <i class="icon-eye-open"></i>');
                $('#'+id).attr('disabled', 'disabled');
                $('#'+id+'-container').fadeOut(3000);
                $('#'+id).remove();
                $('#'+id+'-container').appendTo('.my-watchlist').fadeIn(3000);
            }
        );
    }

    function addWatchlistProfile(id, account_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'addWatchlist',
                id: id,
                account_id: account_id
            },
            function(){
                $('#'+id).html('Added to Watchlist <i class="icon-eye-open"></i>');
                $('#'+id).attr('disabled', 'disabled');
                $('#'+id).fadeOut(3000);
            }
        );
    }

    function addContact(account_id1, account_id2){
        $.post('modules/ajax/ajax.php',
            {
                action: 'addContact',
                account_id1: account_id1,
                account_id2: account_id2
            },
            function(){
                $('#'+account_id1).html('Added to Network <i class="icon-plus-sign"></i>');
                $('#'+account_id1).attr('disabled', 'disabled');
                $('#'+account_id1+'-container').fadeOut(3000);
                $('#'+account_id1).remove();
                $('#'+account_id1+'-container').appendTo('.my-watchlist').fadeIn(3000);
            }
        );
    }

    function addContactProfile(account_id1, account_id2){
        $.post('modules/ajax/ajax.php',
            {
                action: 'addContact',
                account_id1: account_id1,
                account_id2: account_id2
            },
            function(){
                $('#'+account_id1).html('Added to Network <i class="icon-plus-sign"></i>');
                $('#'+account_id1).attr('disabled', 'disabled');
                $('#'+account_id1).fadeOut(3000);
            }
        );
    }

    function ratePolitician( rating,account_id, politician_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'ratePolitician',
                rating: rating,
                account_id: account_id,
                politician_id: politician_id
            },
            function(response){
                data = jQuery.parseJSON(response);
                rate = data.like[0].like - data.hate[0].hate;
                $('#politician-rating').text(rate);
            }
        );
    }

    function deleteWikip(wikip_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'deleteWikip',
                wikip_id: wikip_id
            },
            function(){
                var wikipcount = parseInt($('#wikip-count').text());
                wikipcount--;
                $('#'+wikip_id).fadeOut(3000);
                $('#wikip-count').text(wikipcount);
            }
        );
    }

    function deletePromise(promise_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'deletePromise',
                promise_id: promise_id
            },
            function(){
                $('#'+promise_id).fadeOut(3000);
            }
        );
    }

    function approveWikip(wikip_id){
        $.post('modules/ajax.php',
            {
                action: 'approve',
                wikip_id: wikip_id
            },
            function(){
                $('#'+wikip_id).fadeOut(3000);
            }
        );
    }

    function submitAnswer(wikip_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'submitAnswer',
                wikip_id: wikip_id,
                answer: $('#'+wikip_id+'-answer').val()
            },
            function(){
                $('#'+wikip_id).fadeOut(3000);
            }
        );
    }

    function demandAnswer(wikip_id, account_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'demandAnswer',
                wikip_id: wikip_id,
                account_id: account_id
            },
            function(response){
                data = jQuery.parseJSON(response);
                console.log(data);
                demand = data[0].demand;
                $('#'+wikip_id+'-demand').text(demand);
                if($('#'+wikip_id+'-demand-btn').hasClass('btn-success'))
                    $('#'+wikip_id+'-demand-btn').attr('class', 'btn btn-inverse btn-small');
                else 
                    $('#'+wikip_id+'-demand-btn').attr('class', 'btn btn-success btn-small');
            }
        );
    }

    function ratePromise(status, account_id, promise_id, button_id){
        if(promise_id+'-finished' == button_id){
            if($('#'+button_id).hasClass('btn-inverse')){
                $('#'+button_id).attr('class', 'btn btn-success finished active');
            }
            else{
                $('#'+button_id).attr('class', 'btn btn-inverse finished');
                status=0;
            }
            if($('#'+promise_id+'-inprogress').hasClass('btn-info')){
                $('#'+promise_id+'-inprogress').attr('class', 'btn btn-inverse inprogress');
            }
            if($('#'+promise_id+'-failed').hasClass('btn-danger')){
                $('#'+promise_id+'-failed').attr('class', 'btn btn-inverse failed');
            }
        }

        if(promise_id+'-inprogress' == button_id){
            if($('#'+button_id).hasClass('btn-inverse')){
                $('#'+button_id).attr('class', 'btn btn-info inprogress active');
            }
            else{
                $('#'+button_id).attr('class', 'btn btn-inverse inprogress');
                status=0;
            }
            if($('#'+promise_id+'-finished').hasClass('btn-success')){
                $('#'+promise_id+'-finished').attr('class', 'btn btn-inverse finished');
            }
            if($('#'+promise_id+'-failed').hasClass('btn-danger')){
                $('#'+promise_id+'-failed').attr('class', 'btn btn-inverse failed');
            }
        }

        if(promise_id+'-failed' == button_id){
            if($('#'+button_id).hasClass('btn-inverse')){
                $('#'+button_id).attr('class', 'btn btn-danger failed active');
            }
            else{
                $('#'+button_id).attr('class', 'btn btn-inverse failed');
                status=0;
            }
            if($('#'+promise_id+'-finished').hasClass('btn-success')){
                $('#'+promise_id+'-finished').attr('class', 'btn btn-inverse finished');
            }
            if($('#'+promise_id+'-inprogress').hasClass('btn-info')){
                $('#'+promise_id+'-inprogress').attr('class', 'btn btn-inverse inprogress');
            }
        }

        $.post('modules/ajax/ajax.php',
            {
                action: 'ratePromise',
                status: status,
                account_id: account_id,
                promise_id: promise_id
            },
            function(response){
                data = jQuery.parseJSON(response);
                $('#'+promise_id+'-finished .finished-count').text(data.done[0].done);
                $('#'+promise_id+'-inprogress .inprogress-count').text(data.inprogress[0].inprogress);
                $('#'+promise_id+'-stalled .stalled-count').text(data.stalled[0].stalled);
                $('#'+promise_id+'-failed .failed-count').text(data.failed[0].failed);
            }
        );
    }

    function SaveProfile(text, category){
        $.post('modules/ajax/ajax.php',
            {
                action: 'saveProfile',
                politician_id: $('#politician_id').val(),
                account_id: $('#account_id').val(),
                category: category,
                details: text
            }
        );
    }

    function isSeen(account_id){
        $.post('modules/ajax/ajax.php',
            {
                action: 'isSeen',
                account_id: account_id
            }
        );
    }

    function lazyLoad(){
        var timestamp = $('#timestamp').val();
        $('#loading-gif').show();
        $.post('modules/ajax/ajax.php',
            {
                action: 'retrieveWikipsLazy',
                last_timestamp: timestamp
            },
            function(response){
                $('.newsfeed').append(response);
            }
        );
        $('#loading-gif').hide();
    }

    function popUp(url, id, stats, type){
        window.open(url, "WikiPangako", "status = 1, height = 450, width = 600, resizable = 0" );
        $.post('modules/ajax/ajax.php',
            {
                action: 'incrementStatsCount',
                id: id,
                stats: stats,
                type: type
            }
        );
    }

    function FacebookInviteFriends(){
        FB.ui({
            method: 'apprequests',
            message: 'Invite your friends to jon WikiPangako!'
        });
    }

    $(document).ready(function() {

        /*FB.init({
            appId:'516429741767185',
            cookie:false,
            status:true,
            xfbml:true
        });*/

        window.fbAsyncInit = function() {
            FB.init({
              appId      : '516429741767185',
              status     : true,
              xfbml      : true 
            });
        };

        $('#guest-login').click(function(){
            var username = $('#username').val();
            var password = $('#password').val();

            $.post('modules/ajax/ajax.php',
                {
                    action: 'login',
                    username: username,
                    password: password
                },
                function(response){
                    if(response!='true'){
                        $('.alert-error').fadeIn(1000);
                        $('.alert-error').fadeOut(4000);
                    }
                    else
                        $('.alert-error').fadeOut(1000);
                }
            );
        });

        var showChar = 500;
        var ellipsestext = "...";
        var moretext = "<br><br>See more";
        var lesstext = "<br><br>See less";
        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar-1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="javascript: void(0);" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        var showChar2 = 20;
        $('.know-first').each(function() {
            var content = $(this).html();

            if(content.length > showChar2) {

                var c = content.substr(0, showChar2);
                var h = content.substr(showChar2-1, content.length - showChar2);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span>';

                $(this).html(html);
            }

        });

        var showChar3 = 17;
        $('.details').each(function() {
            var content = $(this).html();

            if(content.length > showChar3) {

                var c = content.substr(0, showChar3);
                var h = content.substr(showChar3-1, content.length - showChar3);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });

        /*textarea auto-resize*/
        $("#message").mousemove(function(e) {
            var myPos = $(this).offset();
            myPos.bottom = $(this).offset().top + $(this).outerHeight();
            myPos.right = $(this).offset().left + $(this).outerWidth();

            if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                $(this).css({ cursor: "nw-resize" });
            }
            else {
                $(this).css({ cursor: "" });
            }
        })
        .keyup(function(e) {
            if (e.which == 8 || e.which == 46) {
                $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
            }
            while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                $(this).height($(this).height()+1);
            };
        });

        /*textarea auto-resize*/
        $("#promise").mousemove(function(e) {
            var myPos = $(this).offset();
            myPos.bottom = $(this).offset().top + $(this).outerHeight();
            myPos.right = $(this).offset().left + $(this).outerWidth();

            if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                $(this).css({ cursor: "nw-resize" });
            }
            else {
                $(this).css({ cursor: "" });
            }
        })
        .keyup(function(e) {
            if (e.which == 8 || e.which == 46) {
                $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
            }
            while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                $(this).height($(this).height()+1);
            };
        });

        $("#promise-sources").mousemove(function(e) {
            var myPos = $(this).offset();
            myPos.bottom = $(this).offset().top + $(this).outerHeight();
            myPos.right = $(this).offset().left + $(this).outerWidth();

            if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
                $(this).css({ cursor: "nw-resize" });
            }
            else {
                $(this).css({ cursor: "" });
            }
        })
        .keyup(function(e) {
            if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#promise-sources").val())){
                $('#submit-promise').removeAttr('disabled');
            } else {
                $('#submit-promise').attr('disabled','disabled');
            }
            if (e.which == 8 || e.which == 46) {
                $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
            }
            while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                $(this).height($(this).height()+1);
            };
        });

        $('.fileupload').fileupload();
        $('#navbar').affix();
        $('[data-spy="affix"]').each(function () {
            $(this).affix('refresh')
        });

        $('.hate').click(function(){
            var account_id = $('#account-id').val();
            var politician_id = $('#politician-id').val();

            if($('.hate').hasClass('btn-inverse')){
                $('.hate').attr('class', 'btn btn-danger rate hate active');
                ratePolitician(0, account_id, politician_id);
                $('#vote-stat').attr('class', 'vote-down');
                $('#vote-stat').text('You voted down.');
                $('#vote-stat').fadeIn();
                $('#vote-stat').delay(2500).fadeOut();
            }
            else{
                $('.hate').attr('class', 'btn btn-inverse rate hate');
                ratePolitician(-1, account_id, politician_id);
                $('#vote-stat').attr('class', 'vote-back');
                $('#vote-stat').text('Vote Removed.');
                $('#vote-stat').fadeIn();
                $('#vote-stat').delay(2500).fadeOut();
            }
            if($('.like').hasClass('btn-success')){
                $('.like').attr('class', 'btn btn-inverse rate like');
            }
        });

        $('.like').click(function(){
            var account_id = $('#account-id').val();
            var politician_id = $('#politician-id').val();

            if($('.like').hasClass('btn-inverse')){
                $('.like').attr('class', 'btn btn-success rate like active');
                like_flag=1;
                ratePolitician(1, account_id, politician_id);
                $('#vote-stat').attr('class', 'vote-up');
                $('#vote-stat').text('You voted up.');
                $('#vote-stat').fadeIn();
                $('#vote-stat').delay(2500).fadeOut();
            }
            else{
                $('.like').attr('class', 'btn btn-inverse rate like');
                ratePolitician(-1, account_id, politician_id);
                $('#vote-stat').attr('class', 'vote-back');
                $('#vote-stat').text('Vote Removed.');
                $('#vote-stat').fadeIn();
                $('#vote-stat').delay(2500).fadeOut();
            }
            if($('.hate').hasClass('btn-danger')){
                $('.hate').attr('class', 'btn btn-inverse rate hate');
            }
        });

        $('.head').each(function(){
            var $content = $(this).closest('li').find('.content');
            $(this).click(function(e){
                e.preventDefault();
                $content.not(':animated').slideToggle();
            });
        });

        $('.ask').click(function(){
            if($('#ask-politician').val()=='')
                return false;
            else return true;
        });

        $('.wikip').click(function(){
            if($('#wikip-politician').val()=='')
                return false;
            else return true;
        });

        $('#drop3').click(function(e) {
            $('.notif-count-request').hide();
        });

        $('#drop4').click(function(e) {
            $('.notif-count').hide();
            account_id = $('#account_id').val();
            isSeen(account_id);
        });

        $('.share-wikip').click(function(e) {
            wikip_id = $(this).attr('id');
            url = $('#'+wikip_id+'-url').val();
            caption = encodeURIComponent($('#'+wikip_id+'-caption').val());
            wikip_id = wikip_id.replace('-share-wikip', '');

            popUp('https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'+wikip_id+'&p[images][0]='+url+'&p[title]=WikiPangako&p[summary]='+caption, wikip_id, 'share', 'wikip');
        });

        $('.share-promise').click(function(e) {
            promise_id = $(this).attr('id');
            name = encodeURIComponent($('#'+promise_id+'-name').val());
            politician_id = $('#'+promise_id+'-politician').val();
            politician_name = encodeURIComponent($('#'+promise_id+'-politician-name').val());
            details = encodeURIComponent($('#'+promise_id+'-details').val());
            promise_id = promise_id.replace('-share-promise', '');
            popUp('https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwww.wikipangako.com%2F%3Fread_only%3Dtrue%26promise_id%3D'+promise_id+'&p[images][0]=http://www.wikipangako.com/img/politicians/'+politician_id+'.jpg&p[title]='+name+'%20by%20'+politician_name+'&p[summary]='+details, promise_id, 'share', 'promise');
        });

        $('.tweet-wikip').click(function(e) {
            wikip_id = $(this).attr('id');
            caption = encodeURIComponent($('#'+$(this).attr('id')+'-caption').val());
            wikip_id = wikip_id.replace('-tweet-wikip', '');
            popUp('https://twitter.com/intent/tweet?text=%20%23wikipangako%20%23'+caption+'&url=http%3A%2F%2Fwikipangako.com%2F%3Fread_only%3Dtrue%26wikip_id%3D'+wikip_id+'&related=sharethis&via=wikipangako', wikip_id, 'tweet', 'wikip');
        });

        $('.tweet-promise').click(function(e) {
            promise_id = $(this).attr('id');
            details = encodeURIComponent($('#'+$(this).attr('id')+'-details').val());
            promise_id  = promise_id.replace('-tweet-promise', '');
            popUp('https://twitter.com/intent/tweet?text=%20%23pangakowatch%20%23'+details+'&url=http%3A%2F%2Fwww.wikipangako.com%2F%3Fmain%3Dhome%26inner%3Dpromise_url%26promise_id%3D'+promise_id+'&related=sharethis&via=wikipangako', promise_id, 'tweet', 'promise');
        });

        $('.finished').click(function(e) {
            original_id = $(this).attr('id');
            account_id = $('#account_id').val();
            promise_id  = original_id.replace('-finished', '');
            ratePromise(1, account_id, promise_id, original_id);
        });

        $('.inprogress').click(function(e) {
            original_id = $(this).attr('id');
            account_id = $('#account_id').val();
            promise_id  = original_id.replace('-inprogress', '');
            ratePromise(2, account_id, promise_id, original_id);
        });

        $('.failed').click(function(e) {
            original_id = $(this).attr('id');
            account_id = $('#account_id').val();
            promise_id  = original_id.replace('-failed', '');
            ratePromise(4, account_id, promise_id, original_id);
        });

        $('.add-watchlist').click(function(e) {
            politician_id = $(this).attr('id');
            account_id = $('#account_id').val();
            addWatchlist(politician_id, account_id);
        });

        $('.add-watchlist-profile').click(function(e) {
            politician_id = $(this).attr('id');
            account_id = $('#account_id').val();
            addWatchlistProfile(politician_id, account_id);
        });

        $('.add-network-profile').click(function(e) {
            profile_id = $(this).attr('id');
            account_id = $('#account_id').val();
            addContactProfile(profile_id, account_id);
        });

        $('.add-network').click(function(e) {
            profile_id = $(this).attr('id');
            account_id = $('#account_id').val();
            addContact(profile_id, account_id);
        });

        $('.delete-wikip').click(function(e) {
            wikip_id = $(this).attr('id');
            wikip_id = wikip_id.replace('-delete', '');
            deleteWikip(wikip_id);
        });

        $('.delete-promise').click(function(e) {
            promise_id = $(this).attr('id');
            promise_id = promise_id.replace('-delete', '');
            deletePromise(promise_id);
        });

        $('.share-profile').click(function(e) {
            politician_id = $('#politician_id').val();
            name = $('.share-profile-name').val();
            popUp('https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http%3A%2F%2Fwww.wikipangako.com%2F%3Fmain%3Dhome%26inner%3Dpolitician-profile%26id%3D'+politician_id+'&p[images][0]=http%3A%2F%2Fwww.wikipangako.com%2Fimg%2Fpoliticians%2F'+politician_id+'.jpg&p[title]='+name+'&p[summary]=Politician%20Profile', politician_id, 'share', 'politician');
        });

        $('.tweet-profile').click(function(e) {
            politician_id = $('#politician_id').val();
            name = $('.tweet-profile-name').val();
            popUp('https://twitter.com/intent/tweet?text=%20%23pangakowatch%20%23'+name+'&url=http%3A%2F%2Fwww.wikipangako.com%2F%3Fmain%3Dhome%26inner%3Dpolitician-profile%26id%3D'+politician_id+'&related=sharethis&via=wikipangako', politician_id, 'tweet', 'politician');
        });

        $('#invite-friends').click(function(e) {
            FacebookInviteFriends();
        });

        $('#start-tour').click(function(e) {
            $('#siteTour .modal-body').html('<div id="this-carousel-id" class="carousel slide" data-ride="carousel"><div class="carousel-inner"><div class="item active"><img src="../img/tour/welcome.png" width="100%"/></div><div class="item"><img src="../img/tour/cando.png" width="100%"/></div><div class="item"><img src="../img/tour/monitor.png" width="100%"/></div><div class="item"><img src="../img/tour/upload.png" width="100%"/></div><div class="item"><img src="../img/tour/rate.png" width="100%"/></div><div class="item"><img src="../img/tour/getstarted.png" width="100%"/></div></div><a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a><a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a></div>');
        });

        if(document.URL=="http://www.wikipangako.com/?main=home" || document.URL=="http://www.wikipangako.com/?main=home&sort=wikips"){
            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    lazyLoad();
                }
            });
        }
    });
}());