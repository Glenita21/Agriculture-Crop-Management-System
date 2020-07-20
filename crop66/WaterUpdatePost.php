<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$amountused = $_POST["amountused"];
$source = $_POST["source1"];
$method = $_POST["method"];
$cropid = $_POST["CropID"];

//Prepare query
$query = "UPDATE WATER SET amountused ='$amountused', source1 = '$source', method= '$method', CropID='$cropid' WHERE WaterID='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: WaterDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
