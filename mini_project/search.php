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

 #truckid,email,place,contact,truckno,name,cost,capacity
 if(isset($_POST['submited'])){
  $sql = "SELECT cost,cost * $distance AS discos FROM signup WHERE capacity >= '$capacity'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "&nbspcost per kilometer=". $row["cost"]."&nbsp"."&nbsp total cost=". $row["discos"] ."<br>";
# echo "&nbsp". $row["truckid"]. "&nbsp&nbsp&nbsp" . $row["email"]. "&nbsp&nbsp&nbsp". $row["contact"]. "&nbsp&nbsp&nbsp " . $row["place"]. " &nbsp &nbsp&nbsp" . $row["cost"] . " &nbsp&nbsp&nbsp" . $row["capacity"] ."<br>";
}
} else {
echo "0 results";
}
}
?>