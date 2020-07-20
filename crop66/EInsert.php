<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Prepare Insert Query
$amountused=$_POST["Amount_Spent"];
$description = $_POST["Description"];



$mexists=false;

$m_query="select MaintenanceID from MAINTENANCE where Description='".$description."'";

$result = mysqli_query($conn, $m_query);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$maintenanceid = $row["MaintenanceID"];
		$mexists=true;
	}
}
else
{
	echo"<a href='EInsert.html'><h1 align:'center'> Please enter a valid Crop name</h1></a>";
}



if($mexists==true)
{
	//No need to insert id, On each insert, id will be auto-incremented
	$query = "INSERT INTO EXPENDITURE(Amount_Spent,MaintenanceID) VALUES('$amountused','$maintenanceid')";
	

	if (mysqli_query($conn, $query)) 
	{
		//If insert is successful, user will be redirected to Display page
		header("Location: EDisplay.php"); 
	} 
	else 
	{
		echo "Error while inserting Data to DB <br>" . mysqli_error($conn);
	}
}

//close connection
mysqli_close($conn);
?>
