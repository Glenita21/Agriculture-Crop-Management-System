<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$amountused = $_POST["Amount_Spent"];

$maintenanceid = $_POST["MaintenanceID"];

//Prepare query
$query = "UPDATE EXPENDITURE SET Amount_Spent ='$amountused', MaintenanceID='$maintenanceid' WHERE ExpenditureID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: EDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
