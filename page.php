<?php

include '_include/header.php';
include 'config.php';


$permissions = ['email'];

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // Handle API errors
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // Handle SDK errors
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (!$accessToken) {
    $loginUrl = $helper->getLoginUrl('http://localhost/fb_graph/page.php', $permissions);
	echo '<a class="btn btn-primary" style="float: right" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
} else {

    $response = $fb->get('/me/accounts', $accessToken);
	$pagesData = $response->getDecodedBody();

    echo '<h1>Page List</h1>';
    foreach ($pagesData['data'] as $page) {
        echo 'ID: ' . $page['id'] . '<br>';
        echo 'Name: ' . $page['name'] . '<br>';
        echo 'Category: ' . $page['category'] . '<br>';
        // echo 'Access Token: ' . $page['access_token'] . '<br>';
        echo '<br>';
    }

	dd($pagesData);
}
include '_include/footer.php';
?>