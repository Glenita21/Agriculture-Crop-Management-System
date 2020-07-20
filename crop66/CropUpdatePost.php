<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$cropid= $_POST["cropid"];
$cropname = $_POST["cropname"];
$croptype = $_POST["croptype"];
$cropvariety = $_POST["cropvariety"];
$cropduration = $_POST["cropduration"];
$cropquantity = $_POST["cropquantity"];
$cropdate = $_POST["cropdate"];

//Prepare query
$query = "UPDATE CROP SET Crop_name='$cropname', Crop_Type = '$croptype', Crop_Variety = '$cropvariety', Crop_Duration='$cropduration',Crop_Quantity='$cropquantity',Crop_Date='$cropdate' WHERE CropID='$cropid'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: CropDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
