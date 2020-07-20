<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$suppliername = $_POST["Supplier_Name"];
$cropcost = $_POST["Crop_Cost"];
$supplieraddress = $_POST["Supplier_Address"];
$contactno = $_POST["Contact_No"];

//Prepare query
$query = "UPDATE SUPPLIER SET Supplier_Name='$suppliername', Crop_Cost = '$cropcost', Supplier_Address = '$supplieraddress', Contact_No='$contactno' WHERE SupplierID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: SupplierDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
