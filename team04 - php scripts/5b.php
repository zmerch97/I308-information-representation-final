
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$id = mysqli_real_escape_string($con, $_POST['5b']);

$sql = 	"SELECT c.courseNum AS Course, t.grade AS Grade, sem.title, SUM(c.creditHours) AS Credits, ROUND((SUM(g.gpaPoints)/COUNT(g.gpaPoints)),2) AS GPA
FROM student AS st, transcript AS t, section AS s, course AS c, semester AS sem, gradescale AS g
WHERE st.uniqueid = t.studentid
AND s.courseid = c.courseNum
AND st.uniqueid = '$id'
AND s.semesterid = sem.semesterid
AND t.sectionid = s.sectionid
AND t.grade = g.letterGrade
GROUP BY c.courseNum WITH ROLLUP;

";

$result = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Courses</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>Course - ".$row["Course"]." Grade - ".$row["Grade"]." Credits - ".$row["Credits"]." GPA - ".$row["GPA"]."</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>