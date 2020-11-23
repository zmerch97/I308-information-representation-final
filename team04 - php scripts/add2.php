You picked <?php echo $_POST['building'];?>.
<br>
<br>
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$building = mysqli_real_escape_string($con, $_POST['building']);

$sql = 	"SELECT distinct roomid AS Room 
    FROM building AS b, room as r 
    WHERE b.buildingid = r.building AND b.buildingName = '$building'";
$result = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Name</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Room"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>