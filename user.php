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
    $loginUrl = $helper->getLoginUrl('http://localhost/fb_graph/index.php', $permissions);
	echo '<a class="btn btn-primary" style="float: right" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
} else {

	$response = $fb->get('/me?fields=birthday,email,name,gender,hometown,location,id,picture,friends', $accessToken);
	$user = $response->getGraphUser();
	// $user = $response->getGraphNode();

	echo '<div class="card col-md-4">';
    echo '<div class="card-body">';
    echo '<img class="card-img-top" style="height: 50px; width: 50px" src="' . $user['picture']['url'] . '" alt="User Profile Picture">';
    echo '<h5 class="card-title">' . $user->getName() . '</h5>';
    echo '<p class="card-text"><strong>Email:</strong> ' . $user->getEmail() . '</p>';
    echo '<p class="card-text"><strong>Birthday:</strong> ' . $user->getField('birthday')->format('Y-m-d') . '</p>';
    echo '<p class="card-text"><strong>Gender:</strong> ' . $user->getGender() . '</p>';
    echo '<p class="card-text"><strong>Hometown:</strong> ' . $user->getHometown()['name'] . '</p>';
    echo '<p class="card-text"><strong>Location:</strong> ' . $user->getLocation()['name'] . '</p>';

    $friendsEdge = $user->getField('friends');
    echo '<p class="card-text"><strong>Total Friends:</strong> ' . $friendsEdge->getMetaData()['summary']['total_count'] . '</p>';
    echo '</div>';
    echo '</div>';

	dd($user);
}
include '_include/footer.php';
?>