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
$description = "";
$fieldid = 0;

$query = "SELECT * FROM MAINTENANCE where MaintenanceID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$description = $row["Description"];
		
		$fieldid = $row["FieldID"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Maintenance</h2>
	<form action="MUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Description</label>
			<input type="text" name="Description" value="<?php echo $description; ?>" class="form-control">
		</div>
		
        
                <div class="form-group">
			<label>Field ID</label>
			<input type="text" name="FieldID" value="<?php echo $fieldid; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
