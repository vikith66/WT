<?php
session_start();

$cookieName = "last_visit";


if (isset($_COOKIE[$cookieName])) {
    $lastVisit = $_COOKIE[$cookieName];
} else {
    $lastVisit = "This is your first visit!";
}

$currentVisit = date("Y-m-d H:i:s");

setcookie($cookieName, $currentVisit, time() + (86400 * 30), "/"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Visit Example</title>
</head>
<body>
    <h1>Welcome to the Last Visit Page!</h1>
    
    <p>
        <?php if ($lastVisit !== "This is your first visit!") : ?>
            Your last visit was on: <?php echo $lastVisit; ?>
        <?php else: ?>
            <?php echo $lastVisit; ?>
        <?php endif; ?>
    </p>
    
    <p>
        Your current visit time is: <?php echo $currentVisit; ?>
    </p>
</body>
</html>
