<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Crop</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$cropid = $_GET["cropid"];
$cropname = "";
$cropseason = "";
$cropvariety= "";
$cropduration= 0;
$cropquantity="";
$cropdate="";

$query = "SELECT * FROM CROP where CropID=".$cropid;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$cropname = $row["Crop_Name"];
		$cropseason = $row["Crop_Season"];
		$cropvariety = $row["Crop_Variety"];
		$cropduration = $row["Crop_Duration"];
		$cropquantity= $row["Crop_Quantity"];
        $cropdate= $row["Crop_Date"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
    <tr><td>Crop ID</td><td><?php echo $cropid; ?></td></tr>
	<tr><td>Crop Name</td><td><?php echo $cropname; ?></td></tr>
	<tr><td>Crop Season</td><td><?php echo $cropseason; ?></td></tr
	<tr><td>Crop Variety</td><td><?php echo $cropvariety; ?></td></tr>
	<tr><td>Crop Duration</td><td><?php echo $cropduration; ?></td></tr>
    <tr><td>Crop Quantity</td><td><?php echo $cropquantity; ?></td></tr>
    <tr><td>Crop Date</td><td><?php echo $cropdate; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='CropDeletePost.php?cropid=<?php echo $cropid ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
