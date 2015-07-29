<?php
$title = "SwanScreen and BOMAH sharing your event story";
$description = "";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <?php include_once("partials/_meta_data.php"); ?>
        <!-- Styles -->
        <link href="css/bomah.css" rel="stylesheet" type="text/css"/>
    </head>
    <body itemscope itemtype="http://schema.org/Product">

       <?php include_once("partials/_nav.php"); ?>
        <div class="wrapper">
            <div class="section one">
                <div class="background"></div>
                <div class="content">
                    <div class="slideshow-wrapper">
                        <div class="top">
                                <div class="logos">
                                    <div class="logo-swanscreen"><img src="img/swanscreen_hp_logo.png"></div>
                                    <div class="plus">+</div>
                                    <div class="logo-bomah"><img src="img/bomah-logo-light.png"></div>
                                </div>
                            <h1>SHARING YOUR EVENT’S STORY</h1>
                            <div class="search-form">
                                <div id="error_message">You must enter a hashtag for it to work :)</div>
                                <div class="tag-sign">#</div>
                                <div class="search-bar"><input type="text" placeholder="YourHashtag" id="hashtag_input"></div>
                                <a class="search-button" href="#" onclick="gogogo($('#hashtag_input').val());ga('send', 'event', 'BOMAH', 'click', 'go_button');">GO</a>
                            </div>
                            <div class="desktop-only-please">*Tip - visit this page from your computer to create your own slideshow!</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section two">
                <div class="content">
                    <h2>If no one shared your story– did it really happen?</h2>
                    <p>
                        Thanks to today’s technology-driven world, it’s crucial for any event, from a small gathering to a 5 day conference,
                        to have social media presence plan included in your overall marketing strategy.
                        With the limitless reach of our worldwide web, it’s even recommended to have a team dedicated to creating,
                        executing and monitoring your social media strategy.
                    </p>
                </div>
            </div>
            <div class="section three">
                <div class="content">
                    <div class="box-wrapper">
                        <div class="box one">
                            <div class="logo"><img src="img/swanscreen_logo_small2.png"></div>
                            <p>
                                SwanScreen creates amazing slideshows from Instagram pictures, videos and tweets.
                                perfect for any event, whether you’re having a wedding, a party, or even a corporate event.
                                <br/><br/>
                                Just enter your event’s hashtag and click go.
                            </p>
                        </div>
                        <div class="box two">
                            <div class="logo"><img src="img/bomah-logo-dark.png"></div>
                            <p>
                                The BOMAH storytelling strategy is all about engagement.
                                It’s about creating your own message, rather than sharing someone else’s,
                                and connecting with your audience.
                                Through our strategy, we empower you to find your voice,
                                identify your ideal medium, and share your story.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section four">
                <div class="content">
                    <div class="slide"></div>
                </div>
            </div>
            <div class="section five">
                <div class="content">
                    <h2>Do you have an event coming up?</h2>
                    <p>
                        Get in touch with SwanScreen & BOMAH and we’ll take care of it all - from A to Z.
                        <br/>
                            Feel free to reach out with questions by  <a href="mailto:youreventstory@gmail.com" onclick="ga('send', 'event', 'BOMAH', 'click', 'email_us');">emailing us</a>
                    </p>
                </div>
            </div>
            <div class="section six footer">
             <?php include_once("partials/_footer.php"); ?>
            </div>
            <?php include_once("partials/_footer_scripts.php"); ?>
            <script src="js/hashtag_handler.js"></script>
        </body>
    </html>