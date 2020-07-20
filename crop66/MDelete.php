<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Maintenance</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$description = "";
$fieldid= 0;

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
<table>
	<tr><td>Description</td><td><?php echo $description; ?></td></tr>
	<tr><td>FieldID</td><td><?php echo $fieldid; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='MDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
