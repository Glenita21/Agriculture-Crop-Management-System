<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Water</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM WATER";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>CropID</th><th>Amount Used</th><th>Source</th><th>Method</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["WaterID"];
		$amountused = $row["amountused"];
		$source = $row["source1"];
		$method = $row["method"];
		$cropid= $row["CropID"];
        echo "<tr><td>". $id ."</td><td>". $cropid ." </td><td>". $amountused ."</td><td>". $source ." </td><td>". $method ."</td><td> <a href='WaterUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='WaterDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
    }
	echo "</tbody></table>";
} 
else 
{
    echo "0 results";
}

//close connection
mysqli_close($conn);
?>

</body>
