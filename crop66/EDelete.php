<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Expenditure</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$amountused = 0;

$maintenanceid= 0;

$query = "SELECT * FROM EXPENDITURE where ExpenditureID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$amountused = $row["Amount_Spent"];
	
		$maintenanceid = $row["MaintenanceID"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
	<tr><td>Amount Spent</td><td><?php echo $amountused; ?></td></tr>
	<tr><td>Maintenance ID</td><td><?php echo $maintenanceid; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='EDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
