<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";
$distance = $_POST['distance'];
$capacity = $_POST['capacity'];
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

if(isset($_POST['submited'])){
$sql = "SELECT truckid,name,email,contact,cost,capacity, cost * $distance AS discos FROM signup WHERE capacity >= '$capacity'";
$result = ($conn->query($sql));
//declare array to store the data of database
$row = [];

if ($result->num_rows > 0)
{
  // fetch all data from db into array
  $row = $result->fetch_all(MYSQLI_ASSOC);
}
}
?> 
<!DOCTYPE html>
<html>
<style>

	td,th {
		border: 0.5px solid black;
		padding: 50px;
		margin: 50px;
		text-align: center;
		
	}
	tr:hover {background-color: coral;}
</style>

<body>
    <h2>LIST OF SERVICE PROVIDER </h2>
	<table>
		<thead>
			<tr>
				<th>TRUCK ID</th>
				<th>NAME</th>
        <th>EMAIL</th>
        <th>CONTACT NO</th>
                <th>COST PER KM</th>
                <th>WEIGHT IN TON</th>
				<th>TOTAL COST</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			
			?>
			<tr>
	

                <td><?php echo $rows['truckid']; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['contact']; ?></td>
				        <td><?php echo $rows['cost']; ?></td>
                <td><?php echo $rows['capacity']; ?></td>
			        	<td><?php echo $rows['discos']; ?></td>
						
						<td>
						<form action="view.php " method="post">
						<button type="submit" name="view"  value="<?php echo $rows['truckid']; ?>">view</button><br>
						
						</form>
				
						</td>
               
			</tr
			<?php } ?>
		</tbody>
	</table>
	
</body>
</html>

