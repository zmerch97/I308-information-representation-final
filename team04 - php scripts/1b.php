You selected section <?php echo $_POST['1b']?>.
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$course = mysqli_real_escape_string($con, $_POST['1b']);

//only thing to mess with if query is wrong
$sql = 	"SELECT CONCAT(st.lname,', ',st.fname) AS Name, ROUND((SUM(g.gpaPoints)/COUNT(g.gpaPoints)),2) AS GPA 
FROM student AS st, transcript AS t, section as s, gradescale AS g 
WHERE st.uniqueid=t.studentid 
AND t.sectionid=s.sectionid 
AND s.sectionid =$course
AND t.grade = g.letterGrade
GROUP BY Name WITH ROLLUP
";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th></th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".'Name - '.$row["Name"].' - GPA - ' .$row["GPA"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($con);
?>