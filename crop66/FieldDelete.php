<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">Delete Field</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$fieldid = $_GET["fieldid"];
$fieldname = "";
$fieldarea= 0;
$fieldtype = "";
$farmerid= 0;

$query = "SELECT * FROM FIELD where FieldID=".$fieldid;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
        $fieldid = $row["FieldID"];
                $fieldname = $row["Field_Name"];
		$fieldarea = $row["Field_Area"];
		$fieldtype = $row["Field_Type"];
		$farmerid = $row["FarmerID"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>

    <tr><td>Field ID</td><td><?php echo $fieldid; ?></td></tr>
        <tr><td>Field Name</td><td><?php echo $fieldname; ?></td></tr>
	<tr><td>Field Area</td><td><?php echo $fieldarea; ?></td></tr>
	<tr><td>Field Type</td><td><?php echo $fieldtype; ?></td></tr
	<tr><td>Farmer ID</td><td><?php echo $farmerid; ?></td></tr>
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='FieldDeletePost.php?fieldid=<?php echo $fieldid ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>
