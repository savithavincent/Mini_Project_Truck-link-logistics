<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hai</h1><?php echo $_SESSION["truckid"] ?>
    <a href="logout.php">Logout</a>
</body>
</html>