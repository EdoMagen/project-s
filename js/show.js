var slide_duration, payload, ticker, ig_amount, tw_amount, diff, duration, total_slides, current_slide, current_slide_counter, next_slide, next_slide_counter, tw_counter, ig_counter, all_counter, ig_arr = [];

//----> Get Data

var smallScreen = window.innerWidth <=1025;

function call_api(hashtag) {
    $('#bg_layer').removeClass('kenburns');
    jQuery.ajax({
        url: '/api/api.php',
        dataType: 'json',
        type: 'POST',
        data: { tag_twitter: hashtag, tag_instagram: hashtag },
        success: function (response) {
            //console.log(response);
            payload = response;
            if (payload.instagram == null) {
                payload.instagram = [];
            }
            if (payload.instagram.length == 0 && payload.twitter.length == 0) {
                no_such_hashtag()
            }
            else {
                ticker = setInterval(tick, slide_duration);
				if (!smallScreen) {
					$('#bg_layer').addClass('kenburns');
				}
                build_tree();
            }
        },
        error: function () {
            //console.log('error reaching api')
            //setTimeout(5000, call_api(hashtag));
            console.log('error reaching api, waiting 5 seconds and retrying')
            setTimeout(function(){call_api(hashtag)},5000)
        }
    });
}

//----> Parse twitter date
function parseTwitterDate(tdate) {
    var system_date = new Date(Date.parse(tdate));
    var user_date = new Date();
    if (K.ie) {
        //system_date = Date.parse(tdate.replace(/( \+)/, ' UTC$1'))
    }
    var diff = Math.floor((user_date - system_date) / 1000);
    if (diff <= 1) {
        return "just now";
    }
    if (diff < 20) {
        return diff + " seconds ago";
    }
    if (diff < 40) {
        return "half a minute ago";
    }
    if (diff < 60) {
        return "less than a minute ago";
    }
    if (diff <= 90) {
        return "one minute ago";
    }
    if (diff <= 3540) {
        return Math.round(diff / 60) + " minutes ago";
    }
    if (diff <= 5400) {
        return "1 hour ago";
    }
    if (diff <= 86400) {
        return Math.round(diff / 3600) + " hours ago";
    }
    if (diff <= 129600) {
        return "1 day ago";
    }
    if (diff < 604800) {
        return Math.round(diff / 86400) + " days ago";
    }
    if (diff <= 777600) {
        return "1 week ago";
    }
    return "on " + system_date;
}
var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
}();
//------------------------------------------------------------------------------------------------------------------------------

function love_me() {
    $('#loveme').fadeIn();
}

function no_such_hashtag() {
    $('#no_tag').fadeIn();
}

//----> Build the show dom
function build_tree() {
    ig_amount = payload.instagram.length;
    tw_amount = payload.twitter.length;
    diff = Math.floor(ig_amount / tw_amount);
    total_slides = ig_amount + tw_amount;
    duration = (ig_amount + tw_amount) * 10000;
    current_slide_counter = 0;
    next_slide_counter = 0;
    tw_counter = 0;
    ig_counter = 0;
    all_counter = 0;

    function create_tw() {
        var tw_inner;
        var tw_wrapper = document.createElement('div');
        var tw_profile_img = payload.twitter[tw_counter].user.profile_image_url;

        tw_profile_img = tw_profile_img.replace('_normal', '_bigger');
        tw_wrapper.className += "tw_wrapper";
        
        if (payload.twitter[tw_counter].entities.media != undefined && payload.twitter[tw_counter].entities.media != null) {
            tw_wrapper.className += " huge";
           tw_inner = ' <div class="top">' +
            '              <div class="tweet_user_img"><img src="' + tw_profile_img + '"></div>' +
            '              <span class="tweet_user_screen_name">' + payload.twitter[tw_counter].user.name + '</span><br/>' +
            '              <span class="tweet_user_real_name">@' + payload.twitter[tw_counter].user.screen_name + '</span>' +
            '            </div>' +
            '            <div class="tweet_text" style="bottom: 2%;font-size: 0.8em;margin: 0px;left: 0;width: 42%;overflow: hidden;height: 83%;display: inline-block;vertical-align: top;position: absolute;top: 4em;padding: 0.7em;">' + payload.twitter[tw_counter].text + '</div>' +
            '            <div class="tweet_img" style="background-image: url('+payload.twitter[tw_counter].entities.media[0].media_url+');width: 55%;height: 0;position: relative;padding-bottom: 55%;background-size: contain;background-repeat: no-repeat;background-position: 50% 50%;margin-top: -9%;float: right;margin-bottom: 8%;"></div>' +
            '            <div class="bottom" style="position: absolute;bottom: 0;right: 30px;">' +
            '              <div class="tweet_time">' + parseTwitterDate(payload.twitter[tw_counter].created_at) + '</div>' +
            '              <div class="tweet_retweets entypo-retweet">' + payload.twitter[tw_counter].retweet_count + '</div>' +
            '              <div class="tweet_favorites entypo-star">' + payload.twitter[tw_counter].favorite_count + '</div>' +
            '              <br style="clear:both;">' +
            '            </div>';
        }
        else {
            tw_inner = ' <div class="top">' +
            '              <div class="tweet_user_img"><img src="' + tw_profile_img + '"></div>' +
            '              <span class="tweet_user_screen_name">' + payload.twitter[tw_counter].user.name + '</span><br/>' +
            '              <span class="tweet_user_real_name">@' + payload.twitter[tw_counter].user.screen_name + '</span>' +
            '            </div>' +
            '            <div class="tweet_text">' + payload.twitter[tw_counter].text + '</div>' +
            '            <div class="bottom">' +
            '              <div class="tweet_time">' + parseTwitterDate(payload.twitter[tw_counter].created_at) + '</div>' +
            '              <div class="tweet_retweets entypo-retweet">' + payload.twitter[tw_counter].retweet_count + '</div>' +
            '              <div class="tweet_favorites entypo-star">' + payload.twitter[tw_counter].favorite_count + '</div>' +
            '              <br style="clear:both;">' +
            '            </div>';
        }
        tw_wrapper.innerHTML = tw_inner;
        document.getElementById('show').appendChild(tw_wrapper);

    }

    function create_ig() {
        var ig_text;
		if (payload.instagram[ig_counter].caption != null) {
			if (payload.instagram[ig_counter].caption.text != undefined && payload.instagram[ig_counter].caption.text != null) {
				ig_text = payload.instagram[ig_counter].caption.text;

			}
		}
		
		else {
				ig_text = "";
			}
			
        var ig_media;

        if (payload.instagram[ig_counter].videos != undefined) {
            ig_media = '<video autoplay="autoplay" loop muted>' +
                '           <source src="' + payload.instagram[ig_counter].videos.standard_resolution.url + '" type="video/mp4">' +
                '                Your browser does not support the video tag.' +
                '       </video>'
        }
        else {
            ig_media = '<img src="' + payload.instagram[ig_counter].images.standard_resolution.url + '">'
            ig_arr.push(payload.instagram[ig_counter].images.standard_resolution.url);
        }
        var ig_wrapper = document.createElement('div');
        ig_wrapper.className += "ig_wrapper";
        var ig_inner = '<div class="left">' +
            '<div class="ig_user_img"><img src="' + payload.instagram[ig_counter].user.profile_picture + '"></div>' +
            '<div class="ig_user_screen_name">@' + payload.instagram[ig_counter].user.username + '</div>' +
            '<div class="ig_caption">' + ig_text + '</div>' +
            '<div class="ig_likes entypo-heart">Likes: ' + payload.instagram[ig_counter].likes.count + '</div>' +
            '</div>' +
            '<div class="right">' +
            '<div class="ig_img">' + ig_media + '</div>' +
            '</div>';
        ig_wrapper.innerHTML = ig_inner;
        document.getElementById('show').appendChild(ig_wrapper);

    }

    for (var i = 0; i < tw_amount; i++) {
        create_tw();
        tw_counter++;
        all_counter++;

        for (var j = 0; j < diff; j++) {
            create_ig();
            ig_counter++;
            all_counter++;
        }
    }

    for (all_counter; all_counter < total_slides; all_counter++) {
        create_ig();
        ig_counter++;
    }

}

// Tick tock
function tick() {
    $('#loveme').fadeOut();
    $(current_slide).removeClass('active');

    current_slide = $('#show').children()[current_slide_counter];
    next_slide_counter = current_slide_counter + 1;
    next_slide = $('#show').children()[next_slide_counter];
    current_slide_counter++;

    $(current_slide).addClass('active');

    if ($(current_slide).hasClass('ig_wrapper')) {
        if (!smallScreen) {$('#bg_layer').css('background-image', 'url(' + $('.ig_wrapper.active').find('img').attr('src') + ')');}
        $('.header .logo.active').removeClass('active');
        $('.header .logo.instagram').addClass('active');
    }
    if ($(current_slide).hasClass('tw_wrapper')) {
        if (!smallScreen) {$('#bg_layer').css('background-image', 'url(' + $('.tw_wrapper.active').find('img').attr('src') + ')');}
        $('.header .logo.active').removeClass('active');
        $('.header .logo.twitter').addClass('active');
    }

    if (next_slide_counter > total_slides) {
        clearInterval(ticker);
        $('#loveme').fadeIn();
        document.getElementById('show').innerHTML = '';
        call_api();
        start_show(slide_duration, hashtag);
    }
}

function start_show(duration, hashtag) {
    slide_duration = duration;
    document.getElementById('hashtag').innerHTML = "#" + hashtag;
    document.getElementById('loveme_tag').innerHTML = "#" + hashtag;
    $("#header").show();
    $('body').css('overflow', 'hidden');
    love_me();
    call_api(hashtag);
}

function gogogo(hashtag) {
    if (validate_tag(hashtag)) {
		try { 
			ga('send', 'event', 'Homepage', 'search', hashtag);
		}
		catch(err) {
		}
        window.location = "/show.php?tag=" + hashtag;
    }
}



//validation
function validate_tag(tag) {
    if ("#" + tag == "#") {
        $("#error_message").text('You must enter a hashtag for it to work :)');
        $("#error_message").addClass('active');
        return false;
    }
    if (tag.length > 25 || tag.length < 3) {
        $("#error_message").text('The hashtag must be 3-25 characters long');
        $("#error_message").addClass('active');
        return false;
    }

    if (tag.indexOf(' ') >= 0) {
        $("#error_message").text('The hashtag cannot have spaces in it :)');
        $("#error_message").addClass('active');
        return false;
    }

    if (specialchars(tag)) {
        $("#error_message").text('The hashtag cannot have special characters in it :)');
        $("#error_message").addClass('active');
        return false;
    }
    if (!twitter_compatible.test("#" + tag)) {
        $("#error_message").text('Invalid hashtag :)');
        $("#error_message").addClass('active');
        return false;
    }
    else {
        hashtag = tag;
        $("#error_message").removeClass('active');
        return true;
    }
}
function specialchars(str) {
    var regex = /[!@#$%^&*()+\-=\[\]{};':"\\|,.<>\/?*$]/g;
    return regex.test(str);
}
twitter_compatible = (function () {
    // Twitter's official hashtag verifier.
    // Ported from https://github.com/twitter/twitter-text-rb/blob/master/lib/twitter-text/regex.rb

    // Creates a Unicode Regular Expression range
    function regexRange(from, to) {
        to = to || 0;

        from = from.toString(16);
        fromLen = (from.length > 4) ? from.length : 4;
        to = to.toString(16);
        toLen = (to.length > 4) ? to.length : 4;

        if (to !== "0") {
            return "\\u" + ("0000" + from).slice(-fromLen) + "-\\u" + ("0000" + to).slice(-toLen) + "";
        }
        else {
            "\\u{" + ("0000" + from).slice(-fromLen) + "}";
        }
    }

    LATIN_ACCENTS = [
        regexRange(0xc0, 0xd6),
        regexRange(0xd8, 0xf6),
        regexRange(0xf8, 0xff),
        regexRange(0x0100, 0x024f),
        regexRange(0x0253, 0x0254),
        regexRange(0x0256, 0x0257),
        regexRange(0x0259),
        regexRange(0x025b),
        regexRange(0x0263),
        regexRange(0x0268),
        regexRange(0x026f),
        regexRange(0x0272),
        regexRange(0x0289),
        regexRange(0x028b),
        regexRange(0x02bb),
        regexRange(0x0300, 0x036f),
        regexRange(0x1e00, 0x1eff)
    ].join("")

    NON_LATIN_HASHTAG_CHARS = [
        // Cyrillic (Russian, Ukrainian, etc.)
        regexRange(0x0400, 0x04ff), // Cyrillic
        regexRange(0x0500, 0x0527), // Cyrillic Supplement
        regexRange(0x2de0, 0x2dff), // Cyrillic Extended A
        regexRange(0xa640, 0xa69f), // Cyrillic Extended B
        regexRange(0x0591, 0x05bf), // Hebrew
        regexRange(0x05c1, 0x05c2),
        regexRange(0x05c4, 0x05c5),
        regexRange(0x05c7),
        regexRange(0x05d0, 0x05ea),
        regexRange(0x05f0, 0x05f4),
        regexRange(0xfb12, 0xfb28), // Hebrew Presentation Forms
        regexRange(0xfb2a, 0xfb36),
        regexRange(0xfb38, 0xfb3c),
        regexRange(0xfb3e),
        regexRange(0xfb40, 0xfb41),
        regexRange(0xfb43, 0xfb44),
        regexRange(0xfb46, 0xfb4f),
        regexRange(0x0610, 0x061a), // Arabic
        regexRange(0x0620, 0x065f),
        regexRange(0x066e, 0x06d3),
        regexRange(0x06d5, 0x06dc),
        regexRange(0x06de, 0x06e8),
        regexRange(0x06ea, 0x06ef),
        regexRange(0x06fa, 0x06fc),
        regexRange(0x06ff),
        regexRange(0x0750, 0x077f), // Arabic Supplement
        regexRange(0x08a0),         // Arabic Extended A
        regexRange(0x08a2, 0x08ac),
        regexRange(0x08e4, 0x08fe),
        regexRange(0xfb50, 0xfbb1), // Arabic Pres. Forms A
        regexRange(0xfbd3, 0xfd3d),
        regexRange(0xfd50, 0xfd8f),
        regexRange(0xfd92, 0xfdc7),
        regexRange(0xfdf0, 0xfdfb),
        regexRange(0xfe70, 0xfe74), // Arabic Pres. Forms B
        regexRange(0xfe76, 0xfefc),
        regexRange(0x200c, 0x200c), // Zero-Width Non-Joiner
        regexRange(0x0e01, 0x0e3a), // Thai
        regexRange(0x0e40, 0x0e4e), // Hangul (Korean)
        regexRange(0x1100, 0x11ff), // Hangul Jamo
        regexRange(0x3130, 0x3185), // Hangul Compatibility Jamo
        regexRange(0xA960, 0xA97F), // Hangul Jamo Extended-A
        regexRange(0xAC00, 0xD7AF), // Hangul Syllables
        regexRange(0xD7B0, 0xD7FF), // Hangul Jamo Extended-B
        regexRange(0xFFA1, 0xFFDC)  // Half-width Hangul
    ].join("");

    CJ_HASHTAG_CHARACTERS = [
        regexRange(0x30A1, 0x30FA), regexRange(0x30FC, 0x30FE), // Katakana (full-width)
        regexRange(0xFF66, 0xFF9F), // Katakana (half-width)
        regexRange(0xFF10, 0xFF19), regexRange(0xFF21, 0xFF3A), regexRange(0xFF41, 0xFF5A), // Latin (full-width)
        regexRange(0x3041, 0x3096), regexRange(0x3099, 0x309E), // Hiragana
        regexRange(0x3400, 0x4DBF), // Kanji (CJK Extension A)
        regexRange(0x4E00, 0x9FFF), // Kanji (Unified)
        regexRange(0x20000, 0x2A6DF), // Kanji (CJK Extension B)
        regexRange(0x2A700, 0x2B73F), // Kanji (CJK Extension C)
        regexRange(0x2B740, 0x2B81F), // Kanji (CJK Extension D)
        regexRange(0x2F800, 0x2FA1F), regexRange(0x3003), regexRange(0x3005), regexRange(0x303B) // Kanji (CJK supplement)
    ].join("");

    // A hashtag must contain latin characters, numbers and underscores, but not all numbers.
    HASHTAG_ALPHA = "[a-z_" + LATIN_ACCENTS + NON_LATIN_HASHTAG_CHARS + CJ_HASHTAG_CHARACTERS + "]";
    HASHTAG_ALPHANUMERIC = "[a-z0-9_" + LATIN_ACCENTS + NON_LATIN_HASHTAG_CHARS + CJ_HASHTAG_CHARACTERS + "]";

    return new RegExp("(#|＃)(" + HASHTAG_ALPHANUMERIC + "*" + HASHTAG_ALPHA + HASHTAG_ALPHANUMERIC + "*)", "ig");
}());
//------------------------------------------------------------------------------------------------------------------------------


function addListener(element, type, callback) {
 if (element.addEventListener) element.addEventListener(type, callback);
 else if (element.attachEvent) element.attachEvent('on' + type, callback);
}
//------------------------------------------------------------------------------------------------------------------------------

//full screen toggle
function toggleFullScreen() {
    if (!document.fullscreenElement &&    // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }
}
//------------------------------------------------------------------------------------------------------------------------------

//Initiation
$(document).ready(function () {
    $('#hashtag_input').focus();
    if (!(navigator.userAgent.toLowerCase().indexOf('chrome') > -1)) {
        $("#bg_layer").css({
            'background-size': 'auto',
            'opacity': '.2'
        });
    }

    $("#hashtag_input").keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            (gogogo($("#hashtag_input").val()));
        }

    });

});
//------------------------------------------------------------------------------------------------------------------------------
