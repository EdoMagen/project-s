<div>Hellooooooooossssssssdddddd</div>


<?php
if (isset($_GET['p']) == "a") {
    echo "helloooooo";
}
echo '<p>hello world...</p>';

echo PHP_BINDIR;
phpinfo();







function sendPost($data) {
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://my.como.com/api/apps/?includeNonPublishedApps=true&skip=0&take=1&dt=rand");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_COOKIESESSION, false);
    //read and pass cookies
    $cookiesStringToPass = '';
    foreach ($_COOKIE as $name=>$value) {
        if ($cookiesStringToPass) {
            $cookiesStringToPass  .= ';';
        }
        $cookiesStringToPass .= $name . '=' . addslashes($value);
    }
    curl_setopt ($ch, CURLOPT_COOKIE, $cookiesStringToPass );


    $result = curl_exec ($ch);
    curl_close ($ch);
    //var_dump($result);
    return $result;
}


.section:nth-child(even) {
background-color: #F5F5F5;
}