<?php
session_start();
require_once 'vendor/autoload.php';

// Replace with your own App ID and App Secret
$app_id = '1364462294415916';
$app_secret = '44c6fde050ba3ab47a322a722fe7b5ae';

$fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v17.0',
]);

$helper = $fb->getRedirectLoginHelper();