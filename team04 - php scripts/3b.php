Staff members that have not taught <?php echo $_POST['3b']?>:
<?php

// Create connection
$con=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }

$course = mysqli_real_escape_string($con, $_POST['3b']);

$sql = 	"SELECT CONCAT(f.fname,' ',f.lname) AS 'Name'
FROM faculty AS f
Where Not Exists
            (SELECT f.uniqueid as 'ID' 
            FROM course as c, section as s
            WHERE c.courseNum = '$course'
                           AND s.facultyid = f.uniqueid
                           AND c.courseNum = s.courseid
GROUP BY 'ID')
ORDER BY 'Name' Desc;

";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th> </th></tr>";
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