<?php

//$tag = $_POST['tag'];
$tag = htmlspecialchars($_GET["tag"]);
$title = "SwanScreen | Free online slideshow for instagram and twitter";
$description = "Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen.";
?>

<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product">

<head>
    <!-- METAS -->
    <title><?php echo $tag." | ".$title; ?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta charset="UTF-8"/>
    <link rel="author" href="https://plus.google.com/115282944563504746806"/>
    <meta property="og:title" content="<?php echo $tag; ?>"/>

    <!-- OG -->
    <meta property="og:image" content="/img/og_image.png"/>
    <meta property="og:url" content="http://www.swanscreen.com"/>
    <meta property="og:site_name" content="SwanScreen"/>
    <meta property="og:type" content="product"/>
    <meta property="og:description" content="<?php echo $description; ?>"/>

    <!-- Twitter card -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@SwanScreen">
    <meta name="twitter:creator" content="@SwanScreen">
    <meta name="twitter:title" content="SwanScreen">
    <meta name="twitter:description" content="<?php echo $description; ?>"/>
    <meta name="twitter:image:src" content="/img/og_image.png">
    <meta name="twitter:image:width" content="256">
    <meta name="twitter:image:height" content="256">
    <meta name="twitter:data1" content="FREE">
    <meta name="twitter:label1" content="Price">

    <!-- Schema.org metas -->
    <meta itemprop="name" content="Swanscreen">
    <meta itemprop="description" content="<?php echo $description; ?>"/>
    <meta itemprop="image" content="http://www.swanscreen.com/img/og_image.png">

    <!-- Styles -->
    <link rel="stylesheet" href="css/show.css"/>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
</head>

<body>

<div class="header" id="header">
    <div class="instagram logo"><img src="img/ig_logo.png"/></div>
    <div class="twitter logo active"><img src="img/Twitter_logo_blue.png"/></div>
    <div id="hashtag">#SomeEvent</div>
    <div class="entypo-" id="fs_toggle" onclick="toggleFullScreen();"></div>

</div>
<div id="bg_layer"></div>
<div id="show"></div>

<div id="no_tag">
    <img src="img/SwanScreen_logo_sad_.png">

    <div id="no_tag_text">We're sorry, no such hashtag was found.<br/><a href="/">Try
            again</a>
    </div>
</div>
<div id="loveme"><img src="img/swanscreen_logo.png">

    <div id="loveme_text">
        Tag your <span class="ig_color">instagram</span> and <span class="tw_color">twitter</span> posts with
        <span id="loveme_tag">#Hashtag</span> to add them to the slideshow!

        <div id="loveme_building">Loading slideshow...</div>
    </div>
</div>


<?php include("partials/_footer_scripts.php"); ?>
<script src="js/show.js"></script>
<script>
    var hashtag = '<?php print($tag) ?>';
    if (validate_tag(hashtag)) {
        start_show(10000,hashtag);
    }
    else {
        no_such_hashtag();
    }
</script>
</body>
</html>
