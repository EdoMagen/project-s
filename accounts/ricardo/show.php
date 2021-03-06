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
    <link rel="stylesheet" href="/css/show.css"/>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico"/>
</head>

<body>

<div class="header" id="header">
    <div class="instagram logo"><img src="../../img/ig_logo.png"/></div>
    <div class="twitter logo active"><img src="../../img/Twitter_logo_blue.png"/></div>
    <div id="hashtag">#SomeEvent</div>
    <div class="entypo-" id="fs_toggle" onclick="toggleFullScreen();"></div>

</div>
<div id="bg_layer"></div>
<div id="show"></div>

<div id="no_tag">
    <img src="/img/SwanScreen_logo_sad_.png">

    <div id="no_tag_text">We're sorry, no such hashtag was found.<br/><a href="/accounts/ricardo">Try
            again</a>
    </div>
</div>
<div id="loveme" style="background-image:url(../../img/accounts/hennabg1.jpg"><img src="../../img/accounts/ricardo_main.png" style="max-width:634px; background-size: cover;background-position: 50%;box-shadow: 5px 5px 15px #000;">

    <div id="loveme_text" style="background: #fff; padding: 15px;box-shadow:5px 5px 15px #000">
        Puede compartir la foto de su tatuaje en <span class="ig_color">instagram</span> o <span class="tw_color">twitter</span> con el Hashtag
        <span id="loveme_tag" style="font-size: 1.15em;">#Hashtag</span>
        <div class="power" style="font-size: 0.35em; text-align:center;margin-top: 1em;">powered by <img src="../../img/swanscreen_logo.png" style="height:2em;position: relative;top: 0.35em;"></div>
        <div id="loveme_building" style="margin-top:0;">Cargando slideshow...</div>
    </div>
</div>
<?php
    $pathToInclude = $_SERVER['DOCUMENT_ROOT'];
    $pathToInclude .= "/partials/_footer_scripts.php"; 
    include_once($pathToInclude); 
?>
<script src="/js/show.js"></script>
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
