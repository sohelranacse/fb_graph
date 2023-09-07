<?php

include '_include/header.php';
include 'config.php';


$permissions = ['user_managed_groups', 'groups_access_member_info', 'user_photos'];

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

    $pageId = "122852817576666";

    $response = $fb->get('/me/accounts', $accessToken);
	$pagesData = $response->getDecodedBody();
    echo '<h1>Page List</h1>';
    foreach ($pagesData['data'] as $page) {
        echo 'ID: ' . $page['id'] . '<br>';
        echo 'Name: ' . $page['name'] . '<br>';
        echo 'Category: ' . $page['category'] . '<br>';
        echo '<br>';
    }

    $response = $fb->get("/$pageId/posts", $accessToken);
    $pagesData = $response->getDecodedBody();
    echo '<h1>Page Post</h1>';
    foreach ($pagesData['data'] as $page) {
        if(isset($page['message'])) {
            // echo 'Post ID: ' . $page['id'] . '<br>';
            echo 'Description: ' . $page['message'] . '<br>';
            echo 'Created Time: ' . $page['created_time'] . '<br>';
            echo '<br>';
        }
    }

	dd($pagesData);
}
include '_include/footer.php';
?>