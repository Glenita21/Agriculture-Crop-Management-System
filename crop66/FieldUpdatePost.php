<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$fieldid= $_POST["FieldID"];
$fieldname= $_POST["Field_Name"];
$fieldarea= $_POST["Field_Area"];
$fieldtype = $_POST["Field_Type"];
$farmerid = $_POST["FarmerID"];

//Prepare query
$query = "UPDATE FIELD SET Field_Name = '$fieldname',Field_Area='$fieldarea', Field_Type = '$fieldtype', FarmerID='$farmerid' WHERE FieldID='$fieldid'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: FieldDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
