<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$farmername = $_POST["Farmer_Name"];



//No need to insert id, On each insert, id will be auto-incremented
$query = "INSERT INTO FARMER(Farmer_Name) VALUES ('$farmername')";

if (mysqli_query($conn, $query)) 
{
    //If insert is successful, user will be redirected to Display page
	header("Location: FarmerDisplay.php"); 
} 
else 
{
    echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
