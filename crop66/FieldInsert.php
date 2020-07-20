<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$fieldid=$_POST["FieldID"];
$fieldname=$_POST["Field_Name"];
$fieldarea=$_POST["Field_Area"];
$fieldtype = $_POST["Field_Type"];
$farmername = $_POST["Farmer_Name"];



$farmerexists=false;

$farmer_query="select FarmerID from FARMER where Farmer_Name='".$farmername."'";

$result = mysqli_query($conn, $farmer_query);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$farmerid = $row["FarmerID"];
		$farmerexists=true;
	}
}
else
{
	echo"<a href='FieldInsert.html'><h1 align:'center'> Please enter a valid Farmer name</h1></a>";
}



if($farmerexists==true)
{
	//No need to insert id, On each insert, id will be auto-incremented
	$query = "INSERT INTO FIELD(FieldID,Field_Name,Field_Area,Field_Type,FarmerID) VALUES('$fieldid','$fieldname','$fieldarea','$fieldtype','$farmerid')";
	

	if (mysqli_query($conn, $query)) 
	{
		//If insert is successful, user will be redirected to Display page
		header("Location: FieldDisplay.php"); 
	} 
	else 
	{
		echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>
