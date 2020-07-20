<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$fieldid = $_GET["fieldid"];
$farmerid = 0;
$fieldname = "";
$fieldarea = 0;
$fieldtype= "";

$query = "SELECT * FROM FIELD where FieldID=".$fieldid;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
        $fieldid = $row["FieldID"];
        $fieldname = $row["Field_Name"];
		$fieldarea = $row["Field_Area"];
		$fieldtype= $row["Field_Type"];
		$farmerid = $row["FarmerID"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Field</h2>
	<form action="FieldUpdatePost.php" method="POST">
		<input type="hidden" name="FieldID" value="<?php echo $fieldid ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
                <div class="form-group"><!--This is bootstrap class-->
			<label>Field Name</label>
			<input type="text" name="Field_Name" value="<?php echo $fieldname; ?>" class="form-control">
		</div>
		<div class="form-group"><!--This is bootstrap class-->
			<label>Field Area</label>
			<input type="text" name="Field_Area" value="<?php echo $fieldarea; ?>" class="form-control">
		</div>
		
		<div class="form-group">
			<label>Field Type</label>
			<select name="Field_Type" class="form-control">
				<option value="Cultivated">Cultivated</option>
				<option value="Barren">Barren</option>
			</select>
		</div>
                
                <div class="form-group">
			<label>Farmer ID</label>
			<input type="text" name="FarmerID" value="<?php echo $farmerid; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>

</body>
</html>
