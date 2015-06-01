<?php
$title = "SwanScreen | Error 500";
$description = "We couldn't find what you were looking for, maybe try the homepage?";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <?php include_once("partials/_meta_data.php"); ?>
        <!-- Styles -->
        <link href="css/textual_page.css" rel="stylesheet" type="text/css"/>
    </head>
    <body itemscope itemtype="http://schema.org/Product">
            <?php include_once("partials/_nav.php"); ?>
        <div class="wrapper">
            <div class="section one">
                <div class="content">
                    <div class="sadness"><img src="img/SwanScreen_logo_sad_.png"/></div>
                    <h2>We couldn't find what you were looking for, maybe try <br/><a href="/" onclick="ga('send', 'event', '500 page', 'click', 'homepage link');">Our homepage</a></h2>
                </div>
            </div>
            <div class="divider white"></div>

            <div class="section six footer">
                <?php include_once("partials/_footer.php"); ?>
            </div>
            <?php include_once("partials/_footer_scripts.php"); ?>
        </body>
    </html>