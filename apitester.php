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
    </head>
    <body itemscope itemtype="http://schema.org/Product">

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script>
                jQuery.ajax({
                        url: '/api/api.php',
                        dataType: 'json',
                        type: 'POST',
                        format: "json",
                        data: { tag_twitter: "test", tag_instagram: "test"},
                        success: function (response) {
                            console.log(response);
                        },
                        error: function () {
                            console.warn('fucking error man');
                        }
                    });
            </script>
        </body>
    </html>