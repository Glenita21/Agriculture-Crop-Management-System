<html>
<head>
    <title>Display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<h2 align="center">FARMER</h2>
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "crop66");
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM FARMER";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0)
{
    // output data of each row
    echo "<table class='table'><thead class='thead-dark'> <tr><th>FramerID</th><th>Farmer Name</th></tr></thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result))
    {
        $farmerid = $row["FarmerID"];
        $farmername = $row["Farmer_Name"];

        echo "<tr><td>". $farmerid ."</td><td>". $farmername ." </td><td>";

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
