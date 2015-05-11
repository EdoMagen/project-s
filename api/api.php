<?php
if(empty($_POST)) die;

$tag_twitter = $_POST['tag_twitter'];
$tag_instagram = $_POST['tag_instagram'];

// Log -------------------------------------------------------------------------------------------------------------------------------------------->
class Log
{
    public function __construct($log_name,$page_name)
    {
        if(!file_exists('../logs/'.$log_name)){ $log_name='default_log.txt'; }
        $this->log_name=$log_name;

        $this->app_id=uniqid();//give each process a unique ID for differentiation
        $this->page_name=$page_name;

        $this->log_file='../logs/'.$this->log_name;
        $this->log=fopen($this->log_file,'a');
    }
    public function log_msg($msg)
    {//the action   
        $timestamp = date(("l, d-M-y H:i:s"), strtotime('+3 hours'));
        $log_line=join(" | ", array($timestamp." (".date("H:i:s")." GMT)", $msg) );
        fwrite($this->log, $log_line."\r\n");
    }
    function __destruct()
    {//makes sure to close the file and write lines when the process ends.
        fclose($this->log);
    }
}
$log=new Log('log.txt','../api.php');
$log->log_msg("Twitter tag: ".$tag_twitter." | Instagram tag: ".$tag_instagram);


// Instagram -------------------------------------------------------------------------------------------------------------------------------------------->
/*
    require_once 'Instagram.php';
    use MetzWeb\Instagram\Instagram;
    // Get class for Instagram
    // More examples here: https://github.com/cosenary/Instagram-PHP-API

    // Initialize class with client_id
    // Register at http://instagram.com/developer/ and replace client_id with your own
    $instagram = new Instagram('7c7392f3f20640c4b7fea526b12301c4');

    // Set keyword for #hashtag
    $tag = $tag_instagram;

    // Get latest photos according to #hashtag keyword
    $media = $instagram->getTagMedia($tag);

    
    // Set number of photos to show
    $limit = 20;
    /*
    // Set height and width for photos
    $size = '640';

    // Show results
    // Using for loop will cause error if there are less photos than the limit
    foreach(array_slice($media->data, 0, $limit) as $data)
    {
        // Show photo
        echo '<p><img src="'.$data->images->thumbnail->url.'" height="'.$size.'" width="'.$size.'" alt="SOME TEXT HERE"></p>';
    }
*/


// Instagram v2-------------------------------------------------------------------------------------------------------------------------------------------->

require 'Instagram.php';
use MetzWeb\Instagram\Instagram;

$instagram = new Instagram(array(
    'apiKey'      => '7c7392f3f20640c4b7fea526b12301c4',
    'apiSecret'   => '12438762eb444f16a33bc159d0cb7640',
    'apiCallback' => 'http://www.swanscreen.com'
));

// Set number of photos to show
$limit = 20;

// Set keyword for #hashtag
$tag = $tag_instagram;

// Get latest photos according to #hashtag keyword
$media = $instagram->getTagMedia($tag);



// Twitter -------------------------------------------------------------------------------------------------------------------------------------------->
require_once 'twitteroauth.php';
define('CONSUMER_KEY', 'czE0kUc8mwImPuzwqVkkh3aoa');
define('CONSUMER_SECRET', '2LohxOlNWFZijkd8yhIz48hz7MA6IS4EZVcivsQ9rhRGGEoM9B');
define('ACCESS_TOKEN', '892316126-x6tKhfmr0C7t5XzxwFc25sJP2I4GuJcUnLUts85X');
define('ACCESS_TOKEN_SECRET', 'xoOtLnTyxBGYDKWDjxKdV1mf8Iuck1u9VEKFvJ1rfqAYu');
$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$query = array(
    "q" => "#" . $tag_twitter,
    "result_type" => "recent"
    //"result_type" => "popular"
);

$results = $toa->get('search/tweets', $query);

//join jsons
$res_array = array('instagram' => $media->data, 'twitter' => $results->statuses);
$res = json_encode($res_array);

header('Content-Type: application/json');
echo $res;


die;


?>