<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$cropid = $_POST["CropID"];
$cropname = $_POST["Crop_Name"];
$cropseason = $_POST["Crop_Season"];
$cropvariety = $_POST["Crop_Variety"];
$cropduration = $_POST["Crop_Duration"];
$cropquantity = $_POST["Crop_Quantity"];
$cropdate  = $_POST["Crop_Date"];

//No need to insert id, On each insert, id will be auto-incremented
$query = "INSERT INTO CROP(CropID,Crop_Name,Crop_Season,Crop_Variety,Crop_Duration,Crop_Quantity,Crop_Date) VALUES ('$cropid','$cropname', '$cropseason', '$cropvariety', '$cropduration','$cropquantity','$cropdate')";

if (mysqli_query($conn, $query)) 
{
    //If insert is successful, user will be redirected to Display page
	header("Location: CropDisplay.php"); 
} 
else 
{
    echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
