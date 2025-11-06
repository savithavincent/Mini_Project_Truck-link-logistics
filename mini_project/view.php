<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

 if(isset($_POST['view'])){

  $truckid = $_POST['view'];
  $sql = "SELECT name,truckid FROM signup WHERE truckid ='$truckid' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "&nbspcost per kilometer=". $row["name"]."&nbsp"."&nbsp total cost=". $row["truckid"] ."<br>";
# echo "&nbsp". $row["truckid"]. "&nbsp&nbsp&nbsp" . $row["email"]. "&nbsp&nbsp&nbsp". $row["contact"]. "&nbsp&nbsp&nbsp " . $row["place"]. " &nbsp &nbsp&nbsp" . $row["cost"] . " &nbsp&nbsp&nbsp" . $row["capacity"] ."<br>";
}
} else {
echo "0 results";
}
}

//--------------------order details-------------------------------------

$userid = $_POST['userid'];
$distance = $_POST['distance'];
$sourse = $_POST['sourse'];
$destination = $_POST['destination'];
$capacity = $_POST['capacity'];

if(isset($_POST['submit'])){
  $sql = "SELECT * FROM log WHERE userid = '$userid' and distance = '$distance'and sourse = '$sourse'and destination = '$destination' and capacity = '$capacity' ";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
if($num>0){
echo'<script>alert("This criteria already exists")</script>';

}else{
  $insert="INSERT INTO log(userid,distance,sourse,destination,capacity)VALUES('$userid','$distance','$sourse','$destination','$capacity') ";
  mysqli_query($conn,$insert);
  header("location:user.html");
}      
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
  <h3>if want to order</h3>

<form action="order.php" action="post">
<button type="submit" name="submit">CONFIRM</button><br><br>
<div>
  <h4>ORDER DETAILS</h4>
  <form action="view.php" method="POST">
  <input type="text" name="userid" placeholder="Enter your User ID"><br>
  <input type="text" name="sourse" placeholder="Enter your starting place"><br>
  <input type="text" name="destination" placeholder="Enter your distination place"><br>
  <input type="number" name="distance" placeholder="Enter the total distance"><br>
  <input type="number" name="capacity" placeholder="Enter total weight of load"><br><br>
  <button type="submit" name="submit">SUBMIT</button><br><br>
                     
      
  </form>
</div>
</form>
</body>
</html>
