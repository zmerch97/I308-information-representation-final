
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$id = mysqli_real_escape_string($con, $_POST['7a']);

$sql = 	"SELECT CONCAT(st.fname,' ',st.lname) AS StudentName, sm.majorid AS Major
FROM student_advisor AS sa, advisor AS a, student AS st, student_major AS sm
WHERE a.uniqueid=sa.advisorid 
AND a.uniqueid='$id' 
AND sa.studentid=st.uniqueid 
AND st.uniqueid = sm.studentid
ORDER BY StudentName";

$result = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Students and Majors</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["StudentName"]." - ".$row["Major"]."</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>
