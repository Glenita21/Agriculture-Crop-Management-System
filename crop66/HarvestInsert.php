<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$harvesttime=$_POST["Harvest_Time"];
$production = $_POST["Production"];
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
	echo"<a href='HarvestInsert.html'><h1 align:'center'> Please enter a valid Crop name</h1></a>";
}



if($cropexists==true)
{
	//No need to insert id, On each insert, id will be auto-incremented
	$query = "INSERT INTO HARVEST(Harvest_Time,Production,CropID) VALUES('$harvesttime','$production','$cropid')";
	

	if (mysqli_query($conn, $query)) 
	{
		//If insert is successful, user will be redirected to Display page
		header("Location: HarvestDisplay.php"); 
	} 
	else 
	{
		echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>
