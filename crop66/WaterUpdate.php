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
$amountused = 0;
$source= "";
$method = "";
$cropid = 0;

$query = "SELECT * FROM WATER where WaterID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$amountused = $row["amountused"];
		$source= $row["source1"];
		$method = $row["method"];
		$cropid = $row["CropID"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Water</h2>
	<form action="WaterUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Amount Used</label>
			<input type="text" name="amountused" value="<?php echo $amountused; ?>" class="form-control">
		</div>
		
		</div>
                <div class="form-group"><!--This is bootstrap class-->
			<label>Source</label>
			<input type="text" name="source1" value="<?php echo $source; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Method</label>
			<input type="text" name="method" value="<?php echo $method; ?>" class="form-control">
		</div>
                <div class="form-group">
			<label>Crop ID</label>
			<input type="text" name="CropID" value="<?php echo $cropid; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
