<?php
$title = "SwanScreen | Free online slideshow for instagram and twitter";
$description = "Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen.";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <?php include_once("partials/_meta_data.php"); ?>
        <!-- Styles -->
        <link href="css/homepage.css" rel="stylesheet" type="text/css"/>
    </head>
    <body itemscope itemtype="http://schema.org/Product">
        <div id="preload-01"></div>
        <div id="preload-02"></div>
        <div id="preload-03"></div>
        <div id="preload-04"></div>
       <?php include_once("partials/_nav.php"); ?>
        <div class="wrapper">
            <div class="section one">
                <div class="background"></div>
                <div class="content">
                    <div class="slideshow-wrapper">
                        <div class="slideshow">
                            <div class="left"><img src="img/swanscreen_hp_logo.png"/></div>
                            <div class="right">
                                <ul>
                                    <li class="slide">
                                        <h1>EASILY TURN YOUR SCREEN
                                        <span class="strong">INTO A LIVE INSTAGRAM AND TWITTER FEED.</span></h1>
                                    </li>
                                    <li class="slide">
                                        <h1>PERFECT FOR ANY EVENT, WHETHER YOU’RE HAVING
                                        <span class="strong">A WEDDING, A HOUSE PARTY OR EVEN CORPORATE EVENTS.</span></h1>
                                    </li>
                                    <li class="slide active">
                                        <h1>FREE, SIMPLE AND BEAUTIFUL<br/>
                                        <span class="strong">SOCIAL MEDIA SLIDESHOW BASED ON YOUR HASHTAG</span></h1>
                                    </li>
                                    <li class="slide">
                                        <h1>JUST TYPE IN YOUR EVENT’S
                                        <span class="strong">HASHTAG AND CLICK “GO”.</span></h1>
                                    </li>
                                </ul>
                            </div>
                            <br style="clear:both;"/>
                            <div class="search-form">
                                <div id="error_message">You must enter a hashtag for it to work :)</div>
                                <div class="tag-sign">#</div>
                                <div class="search-bar"><input type="text" placeholder="YourHashtag" id="hashtag_input"></div>
                                <a class="search-button" href="#" onclick="gogogo($('#hashtag_input').val())">GO</a>
                            </div>
                            <div class="examples">Want to see some examples? try <a href="/show.php?tag=PARTY" onclick="ga('send', 'event', 'First screen', 'click', 'party link');">"PARTY"</a> or <a href="/show.php?tag=WEDDING" onclick="ga('send', 'event', 'First screen', 'click', 'wedding link');">"WEDDING"</a></div>
                            <div class="desktop-only-please">To use SwanScreen - please visit us from your desktop</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider white" id="how-to"></div>
            <div class="section two">
                <div class="content">
                    <h2>How does SwanScreen work?</h2>
                    <div class="embed-container">
                        <iframe id="video" src="http://www.youtube.com/embed/kBDXdCQkZV4?rel=0&amp;hd=1&amp;modestbranding=1&amp;autohide=1&amp;color=white&amp;ps=docs&amp;showinfo=0&amp;theme=light&amp;cc_load_policy=0&amp;nologo=1" width="300" height="150" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                </div>
            </div>
            <div class="divider blue"></div>
            <div class="section three">
                <div class="content">
                    <div class="bullets-wrapper">
                        <ul class="bullets one">
                            <li class="bullet">
                                <div class="icon ig"></div><div class="text"><span itemprop="name">SwanScreen</span> automatically displays new images and videos as they are posted on instagram</div>
                            </li>
                            <li class="bullet">
                                <div class="icon tw"></div><div class="text"><span itemprop="name">SwanScreen</span> shows tweets with or without images in real time</div>
                            </li>
                            <li class="bullet">
                                <div class="icon vid"></div><div class="text"><span itemprop="name">SwanScreen</span> supports videos as well! so no matter what you post- it will look great!</div>
                            </li>
                        </ul>
                        <ul class="bullets two">
                            <li class="bullet">
                                <div class="icon inf"></div><div class="text">No time limits, no image limits, just use it as much as you want</div>
                            </li>
                            <li class="bullet">
                                <div class="icon dol"></div><div class="text">Absolutely, positively, 100% FREE OF CHARGE</div>
                            </li>
                            <li class="bullet">
                                <div class="icon tag"></div><div class="text">All you need is to pick a hashtag, connect your screen and click “GO”</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="divider white"></div>
            <div class="section four">
                <div class="content">
                    <h2>Latest hashtag used</h2>
                    <div id="latest-tag" class="latest-tag"><span>#SELFIE</span></div>
                    <div class="watch-tag-wrapper"><a id="watch-tag" class="watch-tag" href="/show.php?tag=SELFIE" onclick="ga('send', 'event', 'Latest tag', 'click', 'watch');">WATCH</a></div>
                </div>
            </div>
            <div class="divider blue" id="social"></div>
            <div class="section five">
                <h2>Want to say hi?</h2>
                <ul class="social-icons">
                    <li class="social-icon"><a class="icon gp" href="https://google.com/+SwanscreenGlobal" rel="publisher" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'google plus');"></a></li>
                    <li class="social-icon"><a class="icon em" href="mailto:swanscreen@gmail.com" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'email');"></a></li>
                    <li class="social-icon"><a class="icon tw" href="https://twitter.com/SwanScreen" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'twitter');"></a></li>
                    <li class="social-icon"><a class="icon fb" href="http://facebook.com/swanscreen" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'facebook');"></a></li>
                    <li class="social-icon"><a class="icon ig" href="http://instagram.com/swanscreen" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'instagram');"></a></li>
                </ul>
            </div>

            <!--     Special Announcement      -->
            <div id="specialAnnouncement" style=" position: fixed;
                                                  bottom: 0;
                                                  background: #ddd;
                                                  width: 100%;
                                                  font-size: 13px;
                                                  border-top: 3px solid #16AAE1;
                                                  text-align:center;">
              <div id="close" onClick="$('#specialAnnouncement').fadeOut()" style=" position: absolute;
                                                  top: -18px;
                                                  right: 10px;
                                                  width: 30px;">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NDkxMSwgMjAxMy8xMC8yOS0xMTo0NzoxNiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo4QjU5NkZBNDI0NzkxMUU0QTUyNkRBMzc5NDEzRTA3RSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo4QjU5NkZBNTI0NzkxMUU0QTUyNkRBMzc5NDEzRTA3RSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjhCNTk2RkEyMjQ3OTExRTRBNTI2REEzNzk0MTNFMDdFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjhCNTk2RkEzMjQ3OTExRTRBNTI2REEzNzk0MTNFMDdFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+V7rqlwAAA4lJREFUeNrUmjtMFFEUhs+OuCa4EHwEExMNApFIgyFa2IkmdJhogkAsiJ00WtlSoB2NNiIdIfG1FibaWbh0FKJSqavy0sQExPAMCYvsev7Zc+Nm3YGZuXNnd//kTzaTveeeb2buvXMfkdr4HAWkY+w29hl2E7uOfZi9nx1hr7MX2bPsJHuCnWD/CKLyCs3yx9m97G528y7/PSg+yW7Puf6R/ZQ9yvZ9Vy2f5VrYcfYMe8AFxE5qlhjTErMlDJBa9gj7A7tT40Y45dIpsUekLiMgnfJu98o7b0oRqSMpdQYGEmU/kMdeQ+GpRuockhy0QGLsV+w+Kp5uSA4xvyCV7Nd5PUyx1C65VHoFicpdOEelI+Ty0uk1cwK5x75ApaeL7PtuQbqK3CbctJnu3UCOsh9S6WtIcnUEGQy5i9XpmgedQFrZPVQ+6pGc/wPpNzxim/gC6M8HwSd3B5WfkPOJXJBrOh+ADVUVdGif9+Iog7KaH5rX80F8Q7w4f8S2Fxj8V5XThOlSIJjZnfIbZSWVoeVUmpqq97qGURAog7KIoSFM1Oot3RF8cXObrowtUHJ1yxVMLgTKoCxiaKrNkjk2hQFjCAI6bcmjIdMwBiGgJtTUEFQ0JxjDEFB9pDY+t8I/qoOMmpv4t7Ut+1pjlTEI6LcVNIQddTNNl8fmbQgAwPhtCAKqsihEZShjLDZAVoMOql4t9STUk/E6aHrQOqL+MtU+0CYuJeZtux1nfGoJEadMQaCdoL2oNmMQZhrRvpiEyO8ADMEkEWnCNEQIMJOI8iYMCMMwCUTA/sQnvxEORPdQTdRyBVEIBmURQ0Nf0UbUROAR+66fKGqgW0ptu4LIhwHI1NofHZBn9rxXdqzqpPcKdYAMQLhzjewZlfgsZZdIy03IeSZ/FeWO/RVRPkKuA4WWg96xn5QRCHJ9XwgEus1eLgOIZcmVnEB+UmkvYCv1Sa6OIBC2ikt5IXtYcqTdQKBbuiO+ISGnm07zkUJKUXY5cryEIMYlp5QXEGiD/u3dFVtqL3NjpxnijjMvuQvDRW4THZIL+QVRrxm2u66G3DWjri6pO+Vmzu5Wzyl76mfU8BdARupAXXEviw9etEDZ4xWtApYOECAtMVuljgUvhf2u50/Kq6aOOWEbzO+K/mf2Y9I85hQJ8OAZoHDw7Cxl15MxNcDBs1hOx6EOnmGd4C1lD559D6LyvwIMAE9Pe2V/pPzIAAAAAElFTkSuQmCC"/>
            </div>
              <p>Hey there friends, As of January 2nd 2016 - Instagram have enforced an approval process for applications.<br/>
              Unfortunately this means SwanScreen <strong>No longer works with Instagram</strong><br/>
              Twitter is still working as usual.<br/>
              Thank you for understanding.</p>
            </div>
            <!--              -->

            <div class="section six footer">
             <?php include_once("partials/_footer.php"); ?>
            </div>
            <?php include_once("partials/_footer_scripts.php"); ?>
            <script src="js/latest_tag.js"></script>
            <script src="js/homepage.js"></script>
            <script src="js/hashtag_handler.js"></script>
        </body>
    </html>
