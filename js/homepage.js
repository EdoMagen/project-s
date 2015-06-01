//textfit.js
(function(root,factory){"use strict";if(typeof define==="function"&&define.amd){define([],factory)}else if(typeof exports==="object"){module.exports=factory()}else{root.textFit=factory()}})(typeof global==="object"?global:this,function(){"use strict";var defaultSettings={alignVert:false,alignHoriz:false,multiLine:false,detectMultiLine:true,minFontSize:6,maxFontSize:80,reProcess:true,widthOnly:false};return function textFit(els,options,callback){if(typeof callback!=="function")callback=function(){};var settings={};for(var key in defaultSettings){if(options.hasOwnProperty(key)){settings[key]=options[key]}else{settings[key]=defaultSettings[key]}}if(typeof els.toArray==="function"){els=els.toArray()}var elType=Object.prototype.toString.call(els);if(elType!=="[object Array]"&&elType!=="[object NodeList]"){els=[els]}for(var i=0;i<els.length;i++){processItem(els[i],settings)}};function processItem(el,settings){if(!isElement(el)||!settings.reProcess&&el.getAttribute("textFitted")){return false}if(!settings.reProcess){el.setAttribute("textFitted",1)}var innerSpan,originalHeight,originalHTML,originalWidth;var low,mid,high;originalHTML=el.innerHTML;originalWidth=innerWidth(el);originalHeight=innerHeight(el);if(!originalWidth||!settings.widthOnly&&!originalHeight){if(!settings.widthOnly)throw new Error("Set a static height and width on the target element "+el.outerHTML+" before using textFit!");else throw new Error("Set a static width on the target element "+el.outerHTML+" before using textFit!")}if(originalHTML.indexOf("textFitted")===-1){innerSpan=document.createElement("span");innerSpan.className="textFitted";innerSpan.style["display"]="inline-block";innerSpan.innerHTML=originalHTML;el.innerHTML="";el.appendChild(innerSpan)}else{innerSpan=el.querySelector("span.textFitted");if(hasClass(innerSpan,"textFitAlignVert")){innerSpan.className=innerSpan.className.replace("textFitAlignVert","");innerSpan.style["height"]=""}}if(settings.alignHoriz){el.style["text-align"]="center";innerSpan.style["text-align"]="center"}var multiLine=settings.multiLine;if(settings.detectMultiLine&&!multiLine&&innerSpan.scrollHeight>=parseInt(window.getComputedStyle(innerSpan)["font-size"],10)*2){multiLine=true}if(!multiLine){el.style["white-space"]="nowrap"}low=settings.minFontSize+1;high=settings.maxFontSize+1;while(low<=high){mid=parseInt((low+high)/2,10);innerSpan.style.fontSize=mid+"px";if(innerSpan.scrollWidth<=originalWidth&&(settings.widthOnly||innerSpan.scrollHeight<=originalHeight)){low=mid+1}else{high=mid-1}}innerSpan.style.fontSize=mid-1+"px";if(settings.alignVert){addStyleSheet();var height=innerSpan.scrollHeight;if(window.getComputedStyle(el)["position"]==="static"){el.style["position"]="relative"}if(!hasClass(innerSpan,"textFitAlignVert")){innerSpan.className=innerSpan.className+" textFitAlignVert"}innerSpan.style["height"]=height+"px"}}function innerHeight(el){var style=window.getComputedStyle(el,null);return el.clientHeight-parseInt(style.getPropertyValue("padding-top"),10)-parseInt(style.getPropertyValue("padding-bottom"),10)}function innerWidth(el){var style=window.getComputedStyle(el,null);return el.clientWidth-parseInt(style.getPropertyValue("padding-left"),10)-parseInt(style.getPropertyValue("padding-right"),10)}function isElement(o){return typeof HTMLElement==="object"?o instanceof HTMLElement:o&&typeof o==="object"&&o!==null&&o.nodeType===1&&typeof o.nodeName==="string"}function hasClass(element,cls){return(" "+element.className+" ").indexOf(" "+cls+" ")>-1}function addStyleSheet(){if(document.getElementById("textFitStyleSheet"))return;var style=[".textFitAlignVert{","position: absolute;","top: 0; right: 0; bottom: 0; left: 0;","margin: auto;","}"].join("");var css=document.createElement("style");css.type="text/css";css.id="textFitStyleSheet";css.innerHTML=style;document.body.appendChild(css)}});

//scroll to divider
$('.divider').click(function() {
  $('html,body').animate({scrollTop: $(this).offset().top},'500');
});

//Adjust section height
window.onload = function () {
    resizeDiv();
     textFit(document.getElementById('latest-tag'), {maxFontSize: 120,alignHoriz: true});
     
     //Preload background-images:
        var image1 = new Image();
        image1.src = '/img/bg1.jpg';

        var image2 = new Image();
        image2.src = '/img/bg2.jpg';

        var image3 = new Image();
        image3.src = '/img/bg3.jpg';

        var image4 = new Image();
        image4.src = '/img/bg4.jpg';

             //set latest tag
        $('.textFitted span').text("#"+latest_tag);
        $('#watch-tag').attr('href', "/show.php?tag="+latest_tag);
        textFit(document.getElementById('latest-tag'), {maxFontSize: 120,alignHoriz: true});
};

window.onresize = function (event) {
    resizeDiv();
    textFit(document.getElementById('latest-tag'), {maxFontSize: 120,alignHoriz: true});
};
function resizeDiv() {
    vph = $(window).height();
    if (vph < 630) { vph=600 }
    $('.section.one .background').css({'height': vph + 'px'});
    $('.section.one .slideshow-wrapper').css({'height': vph + 'px'}); 
}

var bg_images = ['/img/bg1.jpg',
                 '/img/bg2.jpg',
                 '/img/bg3.jpg',
                 '/img/bg4.jpg'];
function hp_slides() {
    $('.section.one .background').css('background-image','url("'+bg_images[Math.floor(Math.random()*bg_images.length)]+'")');
    $('.slide').removeClass('active');
    $($('.slide')[[Math.floor(Math.random()*$('.slide').length)]]).toggleClass('active');
}
hp_slides();
var slideshow = window.setInterval(hp_slides, 7777);




//------------------Validation and launch------------------
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

//Initiation
$(document).ready(function () {
    $('#hashtag_input').focus();

    $("#hashtag_input").keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            (gogogo($("#hashtag_input").val()));
        }

    });
    
    $('#nav_how').click(function() {
        $("#video")[0].src += "&autoplay=1";
    });

     

});

