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
$maintenanceid = 0;

$query = "SELECT * FROM EXPENDITURE where ExpenditureID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$amountused = $row["amountused"];
		$maintenanceid = $row["MaintenanceID"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Expenditure</h2>
	<form action="EUpdatePost.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Amount Spent</label>
			<input type="text" name="Amount_Spent" value="<?php echo $amountused; ?>" class="form-control">
		</div>
		
               
                <div class="form-group">
			<label>Maintenance ID</label>
			<input type="text" name="MaintenanceID" value="<?php echo $maintenanceid; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
