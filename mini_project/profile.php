<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

session_start();

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>user hai</h1><?php echo $_SESSION["truckerid"] ?>
<a href="logout.php">Logout</a>

</body>
</html>


