You chose the feature: <?php echo $_POST['2a']?>
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$feature = mysqli_real_escape_string($con, $_POST['2a']);

//only thing to mess with if query is wrong
$sql = 	"SELECT s.roomid AS Room
FROM faculty AS f, course AS c, section AS s, room_feature AS rs
WHERE rs.feature = '$feature' AND rs.roomid =s.roomid AND f.uniqueid=s.facultyid AND s.courseid=c.courseNum AND c.title != 'Data'
GROUP BY Room;

";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th></th></tr>";
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
