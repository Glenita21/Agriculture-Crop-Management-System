<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$description = $_POST["Description"];

$fieldid = $_POST["FieldID"];

//Prepare query
$query = "UPDATE MAINTENANCE SET Description ='$description', fieldID='$fieldid' WHERE MaintenanceID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: MDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
