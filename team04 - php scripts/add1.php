You picked <?php echo $_POST['major'];?>.
<br>
<br>
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$major = mysqli_real_escape_string($con, $_POST['major']);

$sql = 	"SELECT CONCAT(s.lname, ', ', s.fname) as 'Name'
	FROM student AS s, student_major AS m
	WHERE m.studentid = s.uniqueid AND m.majorid = '$major'";
$result = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<br><table>";
	echo "<tr><th>Name</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>