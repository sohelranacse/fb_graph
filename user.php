<?php

include '_include/header.php';
include 'config.php';


$permissions = ['email']; // Add any additional permissions you need

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
    $loginUrl = $helper->getLoginUrl('http://localhost/fb_graph/index.php', $permissions);
	echo '<a class="btn btn-primary" style="float: right" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
} else {

	$response = $fb->get('/me?fields=id,name,email', $accessToken); // general information
	$user = $response->getGraphUser();

	dd($user);

	// Display user data
	// echo 'Name: ' . $user->getName() . '<br>';
	// echo 'Email: ' . $user->getEmail() . '<br>';
}
include '_include/footer.php';
?>