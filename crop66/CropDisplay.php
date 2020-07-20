<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        .table{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<h2 align="center">Crop</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM CROP";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>CropID</th><th>Crop Name</th><th>Crop Season</th><th>Crop Variety</th><th>Crop Duration</th><th>Crop Quantity</th><th>Crop Date</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$cropid = $row["CropID"];
		$cropname = $row["Crop_Name"];
		$cropseason = $row["Crop_Season"];
		$cropvariety = $row["Crop_Variety"];
		$cropduration= $row["Crop_Duration"];
        $cropquantity = $row["Crop_Quantity"];
        $cropdate = $row["Crop_Date"];
        echo "<tr><td>". $cropid ."</td><td>". $cropname ." </td><td>". $cropseason ."</td><td>". $cropvariety ." </td><td>". $cropduration ."</td><td>". $cropquantity ."</td><td>". $cropdate ."</td><td> <a href='CropUpdate.php?cropid=". $cropid ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='CropDelete.php?cropid=". $cropid ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
    }
	echo "</tbody></table>";
} 
else 
{
    echo "0 results";
}

//close connection
mysqli_close($conn);
?>

</body>
