<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

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
$cropid = 0;

$query = "SELECT * FROM HARVEST where HarvestID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$harvesttime = $row["Harvest_Time"];
		$production= $row["Production"];
		$cropid = $row["CropID"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Harvest</h2>
	<form action="HarvestUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Harvest Time</label>
			<input type="text" name="Harvest_Time" value="<?php echo $harvesttime; ?>" class="form-control">
		</div>
		
		</div>
                <div class="form-group"><!--This is bootstrap class-->
			<label>Production</label>
			<input type="text" name="Production" value="<?php echo $production; ?>" class="form-control">
		</div>
		
                <div class="form-group">
			<label>Crop ID</label>
			<input type="text" name="CropID" value="<?php echo $cropid; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
