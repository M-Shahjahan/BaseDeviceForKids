<?php
$fb = new Facebook\Facebook([
    'app_id' => '493654488520614',
    'app_secret' => 'c150c576ee1ef48ccef5097db3a0ff38',
    'default_graph_version' => 'v10.0',
]);
try {
    // Returns a `Facebook\Response` object
    $response = $fb->get('/me?fields=id,name', 'EAAHAZBeRuF6YBAMUTwh711Dg3ZCoSEDukagNNtvgthM2cknYIgjMQlnbtyZBG5WA3N6jwZBTeIZAVNMPkmHps2ZAXRKBEZCVbzVkwyPhbq8GuG0hFTAmQPGwuP3VYZCZBt4tMCBaHPLyGc0mqo0srb4EETsbOdaZB7i7BMB3bTNhKeCUWHAm2W9hDh');
} catch(Facebook\Exception\ResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exception\SDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];
?>

