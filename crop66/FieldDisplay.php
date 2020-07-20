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


        .table td, ,table th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr:hover {background-color: #ddd;}


        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;;
            color: white;
        }
    </style>
</head>
<body>
<h2 align="center">Field</h2>
<?php


//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM FIELD";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Farmer ID</th><th>Field_Name</th><th>Field_Area</th><th>Field_Type</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$fieldid = $row["FieldID"];
        $fieldname = $row["Field_Name"];
		$feildarea = $row["Field_Area"];
		$feildtype = $row["Field_Type"];
		$farmerid= $row["FarmerID"];


        echo "<tr><td>". $fieldid ."</td><td>". $farmerid ."</td><td>".$fieldname."</td><td>". $feildarea ."</td><td>". $feildtype ." </td><td> <a href='FieldUpdate.php?fieldid=". $fieldid ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='FieldDelete.php?fieldid=". $fieldid ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
