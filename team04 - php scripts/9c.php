<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$id = mysqli_real_escape_string($con, $_POST['7a']);

$sql = 	"SELECT DISTINCT m.majorid AS Major, CONCAT(st.fname, ' ', st.lname) AS Name, SUM(DISTINCT c.creditHours) AS Credits, ROUND((SUM(g.gpaPoints)/COUNT(g.gpaPoints)),2) AS GPA
FROM student AS st, transcript AS t, section AS s, course AS c, semester AS sem, gradescale AS g, major AS m, student_major as sm
WHERE st.uniqueid = t.studentid
AND s.courseid = c.courseNum
AND s.semesterid = sem.semesterid
AND t.sectionid = s.sectionid
AND t.grade = g.letterGrade
AND m.majorid = sm.majorid
AND st.uniqueid = sm.studentid
GROUP BY Name

";

$result = mysqli_query($con, $sql);

$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Name</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>Major - ".$row["Major"]." Name - ".$row["Name"]." Credits - ".$row["Credits"]." GPA - ".$row["GPA"]."</td></tr>";

    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>