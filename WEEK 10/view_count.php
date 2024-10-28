<?php
session_start();

if (!isset($_SESSION['page_views'])) {
    $_SESSION['page_views'] = 0;
}

$_SESSION['page_views']++;

$pageViews = $_SESSION['page_views'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Views Counter</title>
</head>
<body>
    <h1>Welcome to the Page Views Counter!</h1>
    
    <p>You have viewed this page <?php echo $pageViews; ?> time(s) during this session.</p>
</body>
</html>
