<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
//get ID
$fieldid= $_GET["fieldid"];


//Prepare Query
$query = "DELETE from FIELD WHERE FieldID='$fieldid'";

if (mysqli_query($conn, $query)) 
{
    //If Delete is successful, user will be redirected to Display page
	header("Location: FieldDisplay.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
