<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">All Employees</h2>
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM Employee";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Date-Of-Birth</th><th>Gender</th><th>Salary</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["emp_id"];
		$firstname = $row["first_name"];
		$lastname = $row["last_name"];
		$dob = $row["birth_date"];
		$gender = $row["sex"];
		$salary = $row["salary"];
        echo "<tr><td>". $id ."</td><td>". $firstname ." </td><td>". $lastname ."</td><td>". $dob ." </td><td>". $gender ." </td><td>". $salary ."</td><td> <a href='EmpUpdate.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='EmpDelete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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
