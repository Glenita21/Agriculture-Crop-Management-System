<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$amountused=$_POST["amountused"];
$source = $_POST["source1"];
$method = $_POST["method"];
$cropname = $_POST["Crop_Name"];



$cropexists=false;

$crop_query="select CropID from CROP where Crop_Name='".$cropname."'";

$result = mysqli_query($conn, $crop_query);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$cropid = $row["CropID"];
		$cropexists=true;
	}
}
else
{
	echo"<a href='WaterInsert.html'><h1 align:'center'> Please enter a valid Crop name</h1></a>";
}



if($cropexists==true)
{
	//No need to insert id, On each insert, id will be auto-incremented
	$query = "INSERT INTO WATER(amountused,source1,method,CropID) VALUES('$amountused','$source','$method','$cropid')";
	

	if (mysqli_query($conn, $query)) 
	{
		//If insert is successful, user will be redirected to Display page
		header("Location: WaterDisplay.php"); 
	} 
	else 
	{
		echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>
