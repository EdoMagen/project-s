<?php
    $title = "SwanScreen | Free online slideshow for instagram and twitter";
    $description = "Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen.";
    $_docroot = $_SERVER['DOCUMENT_ROOT'];
    define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(PROJECT_ROOT.'partials/_meta_data.php'); ?>
        <!-- Styles -->
        <link href="/css/account.css" rel="stylesheet" type="text/css"/>
        <style>
          .left {
            width:80% !important;
          }
          .left img {
            max-width: 40%;
            vertical-align: middle;
          }
          .left .plus {
            font-size: 80px;
            vertical-align: middle;
          }
        </style>
    </head>
    <body itemscope itemtype="http://schema.org/Product">
        <?php include(PROJECT_ROOT.'partials/_nav.php'); ?>
        <div class="wrapper">
            <div class="section one">
            <div class="background"></div>
                <div class="content">
                    <div class="slideshow-wrapper">
                        <div class="slideshow">
                            <div class="left">
                              <img src="/img/swanscreen_hp_logo.png"/>
                              <span class="plus">+</span>
                              <img src="../../img/accounts/funbox_logo_main.png"/></div>
                            <br style="clear:both;"/>
                            <div class="search-form">
                                <div id="error_message">You must enter a hashtag for it to work :)</div>
                                <div class="tag-sign">#</div>
                                <div class="search-bar"><input type="text" placeholder="YourHashtag" id="hashtag_input"></div>
                                <a class="search-button" href="#" onclick="gogogo($('#hashtag_input').val())">GO</a>
                            </div>
                            <div class="desktop-only-please">To use SwanScreen - please visit us from your desktop</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider blue" id="how-to"></div>
            <div class="section five">
                <h2>Miss us?</h2>
                <ul class="social-icons">
                    <li class="social-icon"><a class="icon gp" href="https://google.com/+SwanscreenGlobal" rel="publisher" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'google plus funbox');"></a></li>
                    <li class="social-icon"><a class="icon em" href="mailto:swanscreen@gmail.com" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'email funbox');"></a></li>
                    <li class="social-icon"><a class="icon tw" href="https://twitter.com/SwanScreen" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'twitter funbox');"></a></li>
                    <li class="social-icon"><a class="icon fb" href="http://facebook.com/swanscreen" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'facebook funbox');"></a></li>
                    <li class="social-icon"><a class="icon ig" href="http://instagram.com/swanscreen" target="_blank" onclick="ga('send', 'event', 'Social Icons', 'click', 'instagram funbox');"></a></li>
                </ul>
            </div>
            <div class="section six footer">
                <?php include(PROJECT_ROOT.'partials/_footer.php'); ?>
            </div>
            <?php include(PROJECT_ROOT.'partials/_footer_scripts.php'); ?>
            <script src="/js/hashtag_handler.js"></script>
        </body>
    </html>
