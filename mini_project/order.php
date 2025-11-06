
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

$userid = $_POST['userid'];
$distance = $_POST['distance'];
$sourse = $_POST['sourse'];
$destination = $_POST['destination'];
$capacity = $_POST['capacity'];
$orderid = $_POST['orderid'];
$totalcost = $_POST['totalcost'];
$order= $_POST['order'];

if(isset($_POST['submit'])){
  $sql = "SELECT * FROM log WHERE userid = '$userid' and distance = '$distance'and sourse = '$sourse'and destination = '$destination' and capacity = '$capacity' ";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
if($num>0){
echo'<script>alert("This criteria already exists")</script>';

}else{
  $insert="INSERT INTO log(userid,distance,sourse,destination,capacity,truckerid,totalcost,order_user)VALUES('$userid','$distance','$sourse','$destination','$capacity','$orderid','$totalcost','$order') ";
 # mysqli_query($conn,$insert);
  $result = mysqli_query($conn,$insert);
  if($result)
  {
  echo "&nbsp Register Sucessfully";
  header("location:orderconfirm.html");
  }
  else
  {
  echo "&nbspError in Delete";
  
  }
}      
}
?>