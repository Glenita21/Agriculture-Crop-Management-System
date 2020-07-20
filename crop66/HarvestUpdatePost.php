<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$harvesttime = $_POST["Harvest_Time"];
$production = $_POST["Production"];
$cropid = $_POST["CropID"];

//Prepare query
$query = "UPDATE HARVEST SET Harvest_Time ='$harvesttime', Production = '$production', CropID='$cropid' WHERE HarvestID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: HarvestDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
