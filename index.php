<?php

include '_include/header.php';
include 'config.php';


$permissions = ['email']; // Add any additional permissions you need

$loginUrl = $helper->getLoginUrl('http://localhost/fb_graph/user.php', $permissions);
echo '<a class="btn btn-primary" style="float:right" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

include '_include/footer.php';
?>