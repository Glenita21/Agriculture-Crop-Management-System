<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Water</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$amountused = 0;
$source= "";
$method= "";
$cropid= 0;

$query = "SELECT * FROM WATER where WaterID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$amountused = $row["amountused"];
		$source = $row["source1"];
		$method = $row["method"];
		$cropid = $row["CropID"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
	<tr><td>Amount Used</td><td><?php echo $amountused; ?></td></tr>
	<tr><td>Source</td><td><?php echo $source; ?></td></tr
	<tr><td>Method</td><td><?php echo $method; ?></td></tr>
	<tr><td>Crop ID</td><td><?php echo $cropid; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='WaterDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
