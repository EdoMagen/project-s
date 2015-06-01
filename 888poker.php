<?php

//$tag = $_POST['tag'];
$tag = "Masterminds888";

?>

<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product">

<head>
    <!-- METAS -->
    <title>SwanScreen | Free online slideshow for instagram and twitter</title>
    <meta name="description"
          content="Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen."/>
    <meta charset="UTF-8"/>
    <link rel="author" href="https://plus.google.com/115282944563504746806"/>
    <meta property="og:title" content="SwanScreen | Free online slideshow for instagram and twitter"/>

    <!-- OG -->
    <meta property="og:image" content="/img/og_image.png"/>
    <meta property="og:url" content="http://www.swanscreen.com"/>
    <meta property="og:site_name" content="SwanScreen"/>
    <meta property="og:type" content="product"/>
    <meta property="og:description"
          content="Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen."/>

    <!-- Twitter card -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@SwanScreen">
    <meta name="twitter:creator" content="@SwanScreen">
    <meta name="twitter:title" content="SwanScreen">
    <meta name="twitter:description"
          content="Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen.">
    <meta name="twitter:image:src" content="/img/og_image.png">
    <meta name="twitter:image:width" content="256">
    <meta name="twitter:image:height" content="256">
    <meta name="twitter:data1" content="FREE">
    <meta name="twitter:label1" content="Price">

    <!-- Schema.org metas -->
    <meta itemprop="name" content="Swanscreen">
    <meta itemprop="description"
          content="Display beautiful live,real-time Instagram slideshows at weddings, parties, conferences, concerts or anywhere there's a screen.">
    <meta itemprop="image" content="http://www.swanscreen.com/img/og_image.png">

    <!-- Styles -->
    <link rel="stylesheet" href="css/main_min.css"/>
    <link rel="stylesheet" href="css/entypo.css"/>
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
<div id="loveme"><img src="img/MM5-logos.png">


    <div id="loveme_text">
        Marque seu post no <span class="ig_color">instagram</span> e <span class="tw_color">twitter</span> com
        <span id="loveme_tag" style="font-size: 1.15em;">#Hashtag</span> para adicioná -los no slideshow!
		<div class="power" style="font-size: 0.35em; text-align:center;margin-top: 1em;">powered by <img src="img/swanscreen_logo.png" style="height:2em;position: relative;top: 0.35em;"></div>
        <div id="loveme_building" style="margin-top:0;">Carregando slideshow...</div>
    </div>
</div>


<!--<div id="fs" onclick="toggleFullScreen()">GO FULL SCREEN</div>-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('require', 'displayfeatures');
	ga('create', 'UA-50825696-1', 'swanscreen.com');
	ga('send', 'pageview');
</script>
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
