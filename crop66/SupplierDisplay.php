<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Supplier</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM SUPPLIER";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Supplier_Name</th><th>Crop_Cost</th><th>Supplier_Address</th><th>Contact_No</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["SupplierID"];
		$suppliername = $row["Supplier_Name"];
		$cropcost = $row["Crop_Cost"];
		$supplieraddress = $row["Supplier_Address"];
		$contactno= $row["Contact_No"];
        echo "<tr><td>". $id ."</td><td>". $suppliername." </td><td>". $cropcost ."</td><td>". $supplieraddress ." </td><td>". $contactno ."</td><td> <a href='SupplierUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='SupplierDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
