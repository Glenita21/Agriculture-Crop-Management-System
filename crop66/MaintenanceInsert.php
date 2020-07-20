<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$description = $_POST["Description"];

$fieldname = $_POST["Field_Name"];



$fieldexists=false;

$field_query="select FieldID from FIELD where Field_Name='".$fieldname."'";

$result = mysqli_query($conn, $field_query);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$fieldid = $row["FieldID"];
		$fieldexists=true;
	}
}
else
{
	echo"<a href='MaintenanceInsert.html'><h1 align:'center'> Please enter a valid Field Name </h1></a>";
        
}



if($fieldexists==true)
{
	//No need to insert id, On each insert, id will be auto-incremented
	$query = "INSERT INTO MAINTENANCE(Description,FieldID) VALUES('$description','$fieldid')";
	

	if (mysqli_query($conn, $query)) 
	{
		//If insert is successful, user will be redirected to Display page
		header("Location: MDisplay.php"); 
	} 
	else 
	{
		echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>
