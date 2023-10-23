<?php

$url = $_GET['url'];
$host = 'www.google.com';
$scheme = 'http';
$path = '';

if (filter_var($url, FILTER_VALIDATE_URL) &&
    preg_match('/^(http|https)\:\/\/([a-z0-9_.-]+)(\/(.*))?$/i', $url, $matches)) {

    $scheme = $matches[1];
    $host = $matches[2];
    $path = $matches[3];
    
} elseif (preg_match('/^([a-z0-9_.-:]+)(\/(.*))?$/i', $url, $matches)) {
    $host = $matches[1];
    $path = $matches[2];
} else {
    $url = 'https://www.google.com/search?q=' . urlencode($url);
}


$curl = curl_init($url);

curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => '',
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_SSL_VERIFYPEER => false,    // true if local certificate exist
    CURLOPT_TIMEOUT => 3,
    CURLOPT_HTTPHEADER => [
        'Host: ' . $host,
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',

    ]
]);

$resp = curl_exec($curl);

$resp = str_replace(
    '</head>', 
    '<base href="'.$scheme.'://'.$host.'"></head>', 
    $resp
);

$resp = str_replace(
    $scheme . '://' . $host, 
    'http://' . $_SERVER['HTTP_HOST'] . '/browse.php?url=' . $scheme . '://' . $host . '/', 
    $resp
);

$resp = str_replace(
    'href="/', 
    'href="http://' . $_SERVER['HTTP_HOST'] . '/browse.php?url=' . $scheme . '://' . $host . '/', 
    $resp
);

echo $resp;
