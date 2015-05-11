<?php
$title = "SwanScreen | Free online slideshow for instagram and twitter";
$description = "Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen.";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- METAS -->
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="author" href="https://plus.google.com/115282944563504746806" />
        <link rel="publisher" href="https://plus.google.com/111661182712749681616" />
        
        <!-- OG -->
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:image" content="http://www.swanscreen.com/img/og_image.png" />
        <meta property="og:url" content="http://www.swanscreen.com" />
        <meta property="og:site_name" content="SwanScreen" />
        <meta property="og:type" content="product" />
        <meta property="og:description" content="<?php echo $description; ?>" />
        
        <!-- Twitter card -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@SwanScreen">
        <meta name="twitter:creator" content="@SwanScreen">
        <meta name="twitter:title" content="SwanScreen">
        <meta name="twitter:description" content="<?php echo $description; ?>">
        <meta name="twitter:image:src" content="/img/og_image.png">
        <meta name="twitter:image:width" content="256">
        <meta name="twitter:image:height" content="256">
        <meta name="twitter:data1" content="FREE">
        <meta name="twitter:label1" content="Price">
        
        <!-- Schema.org metas -->
        <meta itemprop="name" content="Swanscreen">
        <meta itemprop="description" content="<?php echo $description; ?>">
        <meta itemprop="image" content="http://www.swanscreen.com/img/og_image_white_bg.png">
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link href="css/homepage.css" rel="stylesheet" type="text/css"/>
    </head>
    <body itemscope itemtype="http://schema.org/Product">
        
        <nav>
            <div class="background"></div>
            <div class="content">
                <span class="logo"><a href="/" onclick="ga('send', 'event', 'Header', 'click', 'logo');"><img src="img/swanscreen_logo_small.png"/></a></span>
                <ul>
                    <li class="menu-item"><a href="#how-to" onclick="ga('send', 'event', 'Header', 'click', 'how-to');">How to</a></li>
                    <li class="menu-item"><a href="#social" onclick="ga('send', 'event', 'Header', 'click', 'contact-us');">Contact us</a></li>
                    <li class="menu-item"><a href="/blog" onclick="ga('send', 'event', 'Header', 'click', 'blog');">Blog</a></li>
                </ul>
            </div>
        </nav>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider white" id="how-to"></div>
            <div class="section two">
                <div class="content">
                    <h2>How does SwanScreen work?</h2>
                    <div class="embed-container">
                        <iframe src="http://www.youtube.com/embed/kBDXdCQkZV4?rel=0&amp;hd=1&amp;modestbranding=1&amp;autohide=1&amp;color=white&amp;ps=docs&amp;showinfo=0&amp;theme=light&amp;cc_load_policy=0&amp;nologo=1" width="300" height="150" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                </div>
            </div>
            <div class="divider blue"></div>
            <div class="section three">
                <div class="content">
                    <div class="bullets-wrapper">
                        <ul class="bullets one">
                            <li class="bullet">
                                <div class="icon ig"></div><div class="text">SwanScreen automatically displays new images and videos as they are posted on instagram</div>
                            </li>
                            <li class="bullet">
                                <div class="icon tw"></div><div class="text">SwanScreen shows tweets with or without images in real time</div>
                            </li>
                            <li class="bullet">
                                <div class="icon vid"></div><div class="text">SwanScreen supports videos as well! so no matter what you post- it will look great!</div>
                            </li>
                        </ul>
                        <ul class="bullets two">
                            <li class="bullet">
                                <div class="icon inf"></div><div class="text">No time limits, no image limits, just use it as much as you want.</div>
                            </li>
                            <li class="bullet">
                                <div class="icon dol"></div><div class="text">Absolutely, positively, 100% FREE OF CHARGE.</div>
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
                    <div id="latest-tag" class="latest-tag"><span>#LIPSUM</span></div>
                    <div class="watch-tag-wrapper"><a class="watch-tag" href="#" onclick="ga('send', 'event', 'Latest tag', 'click', 'watch');">WATCH</a></div>
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
            <div class="section six footer">
                <div class="content">
                    <footer>
                        <ul class="footer-links-wrapper">
                            <li class="footer-links">
                                <h3>Learn more</h3>
                                <ul class="links">
                                    <li class="link"><a href="#" onclick="ga('send', 'event', 'Footer links', 'click', 'home');">Home</a></li>
                                    <li class="link"><a href="#how-to" onclick="ga('send', 'event', 'Footer links', 'click', 'how-to');">How to use</a></li>
                                    <li class="link"><a href="/blog" onclick="ga('send', 'event', 'Footer links', 'click', 'blog');">Blog</a></li>
                                </ul>
                            </li>
                            <li class="footer-links">
                                <h3>Get in touch</h3>
                                <ul class="links">
                                    <li class="link"><a href="#social" onclick="ga('send', 'event', 'Footer links', 'click', 'contact us');">Contact us</a></li>
                                    <li class="link"><a href="http://facebook.com/swanscreen" target="_blank" onclick="ga('send', 'event', 'Footer links', 'click', 'facebook');">On facebook</a></li>
                                    <li class="link"><a href="https://twitter.com/SwanScreen" target="_blank" onclick="ga('send', 'event', 'Footer links', 'click', 'twitter');">On Twitter</a></li>
                                </ul>
                            </li>
                            <li class="footer-links">
                                <h3>Legal stuff</h3>
                                <ul class="links">
                                    <li class="link"><a href="/about-us" onclick="ga('send', 'event', 'Footer links', 'click', 'about us');">About us</a></li>
                                    <li class="link"><a href="/copyright-policy" onclick="ga('send', 'event', 'Footer links', 'click', 'copyright policy');">Copyright policy</a></li>
                                    <li class="link"><a href="/privacy policy" onclick="ga('send', 'event', 'Footer links', 'click', 'privacy policy');">Privacy policy</a></li>
                                </ul>
                            </li>
                        </ul>
                    </footer>
                </div>
                <div class="copyright"><div class="content">&copy; Copyright 2015 Edo Magen, all rights reserved.</div></div>
            </div>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/homepage.js"></script>
            <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-50825696-1', 'swanscreen.com');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
            </script>
        </body>
    </html>