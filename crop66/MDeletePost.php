<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
//get ID
$id= $_GET["id"];


//Prepare Query
$query = "DELETE from MAINTENANCE WHERE MaintenanceID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If Delete is successful, user will be redirected to Display page
	header("Location: MDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
