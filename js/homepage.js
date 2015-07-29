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


