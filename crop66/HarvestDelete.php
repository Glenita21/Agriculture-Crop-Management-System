<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Harvest</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$harvesttime = 0;
$production= 0;
$cropid= 0;

$query = "SELECT * FROM HARVEST where HarvestID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$harvesttime= $row["Harvest_Time"];
		$production = $row["Production"];
		$cropid = $row["CropID"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
	<tr><td>Harvest Time</td><td><?php echo $harvesttime; ?></td></tr>
	<tr><td>Production</td><td><?php echo $production; ?></td></tr>
	<tr><td>Crop ID</td><td><?php echo $cropid; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='HarvestDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
