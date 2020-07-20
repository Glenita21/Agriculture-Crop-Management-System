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
$cropid = $_GET["cropid"];
$cropname = "";
$croptype = "";
$cropvariety = "";
$cropduration = 0;
$cropquantity="";
$cropdate="";

$query = "SELECT * FROM CROP where CropID=".$cropid;

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $cropname = $row["cropname"];
        $cropseason = $row["cropseason"];
        $cropvariety = $row["cropvariety"];
        $cropduration = $row["cropduration"];
        $cropquantity = $row["cropquantity"];
        $cropdate = $row["cropdate"];
    }
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update CROP</h2>
<form action="CropUpdatePost.php" method="POST">
    <input type="hidden" name="cropid" value="<?php echo $cropid ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
    <div class="form-group"><!--This is bootstrap class-->
        <label>Crop Name</label>
        <input type="text" name="cropname" value="<?php echo $cropname; ?>" class="form-control">
    </div>

    <div class="form-group">
        <label>Crop Season</label>
        <select name="cropseason" class="form-control">
            <option value="Rabi">Rabi</option>
            <option value="Kharif">Kharif</option>
        </select>
    </div>
    <div class="form-group"><!--This is bootstrap class-->
        <label>Crop Variety</label>
        <input type="text" name="cropvariety" value="<?php echo $cropvariety; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Crop Duration</label>
        <input type="text" name="cropduration" value="<?php echo $cropduration; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Crop Quantity</label>
        <input type="text" name="cropquantity" value="<?php echo $cropquantity; ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Crop Date</label>
        <input type="text" name="cropdate" value="<?php echo $cropdate; ?>" class="form-control">
    </div>
    <button type="submit" name="save" class="btn btn-default">Update</button>
</form>

</body>
</html>
