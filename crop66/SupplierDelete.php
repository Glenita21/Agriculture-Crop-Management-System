<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Supplier</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$suppliername = "";
$cropcost = 0;
$supplieraddress= "";
$contactno= "";

$query = "SELECT * FROM SUPPLIER where SupplierID=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$suppliername = $row["Supplier_Name"];
		$cropcost = $row["Crop_Cost"];
		$supplieraddress= $row["Supplier_Address"];
		$contactno = $row["Contact_No"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
	<tr><td>Supplier Name</td><td><?php echo $suppliername; ?></td></tr>
	<tr><td>Crop Cost</td><td><?php echo $cropcost; ?></td></tr
	<tr><td>Supplier Address</td><td><?php echo $supplieraddress; ?></td></tr>
	<tr><td>Contact no</td><td><?php echo $contactno; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='SupplierDeletePost.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
