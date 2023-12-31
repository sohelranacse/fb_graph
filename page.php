<?php

include '_include/header.php';
include 'config.php';


$permissions = ['user_managed_groups', 'groups_access_member_info', 'user_photos'];

try {
    $accessToken = "EAATYZBKJeOiwBOyojbp2tF6deApXdydL5ZB5cuwIJxMbf2jaeyRduTfoV28nmDeajn2o0FjVlcEAU0baRB6AWGlT06Ecwfd6Rj5BYEjTHhusWmPDbHMFiOywx1KwwgsrqjcbFZB6ah5OF49sm1DKNpniXL3dB2XUqjPIdilZB55LC9TFN0qVK6ymriFRCxzvC0ZAQUxth";
    // $accessToken = $helper->getAccessToken();
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

    /*$response = $fb->get('/me/accounts', $accessToken);
	$pagesData = $response->getDecodedBody();
    echo '<h1>Page List</h1>';
    foreach ($pagesData['data'] as $page) {
        echo 'ID: ' . $page['id'] . '<br>';
        echo 'Name: ' . $page['name'] . '<br>';
        echo 'Category: ' . $page['category'] . '<br>';
        echo 'Access Token: ' . $page['access_token'] . '<br>';
        echo '<br>';
    }*/
    
    $accessToken = 'EAATYZBKJeOiwBO1MWzkNlZBLZBOL3ArClLKp1EBs2lZArfJX5Foit0RvZA19ZCvq1ZCYUUf6VPAD14ag5SxpXncTZCEfpVLKIqEYB1mtDwo4K9dobVHEB44aCmBFsYTFeeMmbUStXR55gSDvKhFCYHX61fZCphebZAGyhBG4mx0XhzER5H25Wn6ZBDLE3igSZCA5XeYSPh2taMkPGNOfPRAZD';

    /*$response = $fb->get("/$pageId/posts", $accessToken);
    $pagesData = $response->getDecodedBody();
    echo '<h1>Page Post</h1>';
    foreach ($pagesData['data'] as $page) {
        if(isset($page['message'])) {
            echo '<div class="jumbotron py-4">';
            // echo 'Post ID: ' . $page['id'] . '<br>';
            echo 'Description: ' . $page['message'] . '<br>';
            echo 'Created Time: ' . $page['created_time'] . '<br>';
            echo '</div>';
        }
    }*/

    $response = $fb->get("/$pageId/posts?fields=attachments", $accessToken);
    $pagesData = $response->getDecodedBody();
    echo '<h1>Page Photos</h1>';
    foreach ($pagesData['data'] as $post) {
        // Check if the post has attachments
        if (isset($post['attachments'])) {
            $attachments = $post['attachments'];
            
            // Check if the attachment contains media
            if (isset($attachments['data'][0]['media'])) {
                $media = $attachments['data'][0]['media'];

                // dd($media['image']);
                
                // Check if the media is an image
                if ($media['image']) {
                    echo "<img src='{$media['image']['src']}' style='height: 300px;' />";
                    echo '<br>';
                }
            }
        }
    }

	dd($pagesData);
}
include '_include/footer.php';
?>