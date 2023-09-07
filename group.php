<?php

include '_include/header.php';
include 'config.php';


// $permissions = ['email']; // Add any additional permissions you need
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
    $loginUrl = $helper->getLoginUrl('http://localhost/fb_graph/group.php', $permissions);
    echo '<a class="btn btn-primary" style="float: right" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
} else {
    echo '<div class="jumbotron">';

    $group_id = "6511110672257888";

    // group list
    /*$response = $fb->get("/me/groups", $accessToken);
    $data = $response->getGraphEdge();

    echo '<h1>Your Groups</h1>';
    foreach ($data as $group) {
        echo '<p>' . $group['id'] . '</p>';
        echo '<p>' . $group['name'] . '</p>';
        if(isset($group['privacy'])) echo '<p>' . $group['privacy'] . '</p>';
        echo '<hr>';
    }*/

    // feed
    /*$response = $fb->get("/$group_id/feed", $accessToken);
    $data = $response->getGraphEdge();
    echo '<h1>Group Feed</h1>';
    foreach ($data as $post) {
        echo '<p>' . $post->getField('message') . '</p>';
        echo '<p>' . $post->getField('created_time') . '</p>';
        echo '<hr>';
    }*/

    // albumns list
    /*$response = $fb->get("/$group_id/albums", $accessToken);
    $data = $response->getGraphEdge();
    echo '<h1>Albums in the Selected Group</h1>';
    foreach ($data as $album) {
        echo '<h3>' . $album['name'] .' - '.$album['id'] . '</h3>';
        echo '<hr>';
    }*/

    // albums photo with caotion
    /*$album_id = "356433220043857";
    $response = $fb->get("/$album_id/photos?fields=id,source", $accessToken);
    $data = $response->getGraphEdge();
    echo '<h1>Albums in the Selected Group</h1>';
    foreach ($data as $photo) {
        echo '<img height="300" width="300" src="' . $photo['source'] . '">';
        // echo '<p>' . $photo['id'] . '</p>';
        echo '<hr>';
    }*/
    

    // files
    $response = $fb->get("/$group_id/files", $accessToken);
    $data = $response->getGraphEdge();
    echo '<h1>Files in the Selected Group</h1>';
    foreach ($data as $file) {
        echo '<p>' . $file->getField('name') . '</p>';
        echo '<p>' . $file->getField('id') . '</p>';
        echo '<hr>';
    }


    echo '</div>';


    dd($data);
}
include '_include/footer.php';
?>