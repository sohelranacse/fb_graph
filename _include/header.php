<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">GRAPH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="group.php">Group</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page.php">Page</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content Section -->
    <div class="container-fluid mt-2">

<?php
function dd($array = 'debug') {
    echo '<pre>';print_r($array);echo '</pre>';
}
?>