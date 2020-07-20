<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$suppliername = $_POST["Supplier_Name"];
$cropcost = $_POST["Crop_Cost"];
$supplieraddress = $_POST["Supplier_Address"];
$contactno = $_POST["Contact_No"];


//No need to insert id, On each insert, id will be auto-incremented
$query = "INSERT INTO SUPPLIER(Supplier_Name,Crop_Cost,Supplier_Address,Contact_No) VALUES ('$suppliername', '$cropcost', '$supplieraddress', '$contactno')";

if (mysqli_query($conn, $query)) 
{
    //If insert is successful, user will be redirected to Display page
	header("Location: SupplierDisplay.php"); 
} 
else 
{
    echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
