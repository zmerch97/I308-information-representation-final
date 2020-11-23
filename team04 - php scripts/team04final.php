<!doctype html>
<html>
<head>
<title>team04final</title>
</head>
<body>

    <h1>Team 04 Final Main Page</h1>
    <h3>Click the drop down boxes and then click 'Select'</h3>

	<form action ="1b.php" method="post">
		
		  1b. Produce a class roster for a *specified section* sorted by student’s last name, first name. At the end, include the average grade (GPA for the class.)<br>
           <select name = '1b'>
    <option value="">Select...</option>
    <?php
$conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
    { echo nl2br("Established Database Connection \n");}
                // Check connection
                if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
    $result = mysqli_query($conn,"SELECT distinct sectionid FROM section GROUP BY sectionid ASC ");    
            while ($row = mysqli_fetch_assoc($result)) {                  
                unset($id);   
                $id = $row['sectionid']; 
                echo "<option value= $id>$id</option>";
            }
                ?> 
           	
           </select>
            <br>
            <br>
            <input type='submit' value='Select'>
        </form><br>
	
	<form action ="2a.php" method="post">
		
        2a. Produce a list of rooms that are equipped with *some feature*—e.g., “wired instructor station”<br>
           <select name = '2a'>
    <option value="">Select...</option>
    <?php
$conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
    { echo nl2br("Established Database Connection \n");}
                // Check connection
                if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
    $result = mysqli_query($conn,"SELECT DISTINCT feature FROM room_feature");    
            while ($row = mysqli_fetch_assoc($result)) {                  
                unset($feature);   
                $feature = $row['feature']; 
                echo "<option value= '$feature'>$feature</option>";
            }
                ?> 
           	
           </select>
            <br>
            <br>
            <input type='submit' value='Select'>
        </form><br>    
    
	<form action ="3b.php" method="post">
		
		  3b. Produce a list of faculty who have never taught a *specified course*.  <br>
           <select name = '3b'>
          		
    <option value="">Select...</option>
    <?php
$conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
    { echo nl2br("Established Database Connection \n");}
                // Check connection
                if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
    $result = mysqli_query($conn,"SELECT distinct title, courseNum FROM course");    

            while ($row = mysqli_fetch_assoc($result)) {                  
                //unset($title);   
                $title = $row['title']; 
                $course = $row['courseNum'];
                echo "<option value= '$course'>$title</option>";
            }
                ?> 
           	
           </select>
            <br>
            <br>
            <input type='submit' value='Select'>
	</form><br>
	

	<form action ="5b.php" method="post">
		
		  5b. Produce a chronological list of all courses taken by a *specified student*. Show grades earned. Include overall hours taken and GPA at the end. <br>
           <select name = '5b'>
          		
    <option value="">Select...</option>
    <?php
$conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
    { echo nl2br("Established Database Connection \n");}
                // Check connection
                if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
    $result = mysqli_query($conn,"SELECT distinct CONCAT(fname,' ',lname) AS Name, uniqueid FROM student ");    
            while ($row = mysqli_fetch_assoc($result)) {                  
                unset($id,$name);  
                $id = $row['uniqueid'];
                $name = $row['Name'];
                echo "<option value= $id>$name</option>";
            }
                ?> 
           	
           </select>
            <br>
            <br>
            <input type='submit' value='Select'>
		
	</form><br>
	
    	<form action ="7a.php" method="post">
		
            7a.
            Produce an alphabetical list of students with their majors who are advised by a *specified advisor*.
            <br>
           <select name = '7a'>
          		
    <option value="">Select...</option>
    <?php
$conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

// Check connection
if (mysqli_connect_error())
    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
    { echo nl2br("Established Database Connection \n");}
                // Check connection
                if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
    $result = mysqli_query($conn,"SELECT distinct CONCAT(fname,' ',lname) AS Name, uniqueid FROM advisor ");    
            while ($row = mysqli_fetch_assoc($result)) {                  
                unset($id,$name);  
                $id = $row['uniqueid'];
                $name = $row['Name'];
                echo "<option value= $id>$name</option>";
            }
                ?> 
           	
           </select>
            <br>
            <br>
            <input type='submit' value='Select'>
		
	</form><br>
    
    	<form action ="9c.php" method="post">
		
            9c. Produce a list of students with hours earned and overall GPA who have met the graduation requirements for any major. Sort by major and then by student.
            <br>
            <br>
            <input type='submit' value='List'>
		
	</form><br>

    
    <h1>Additional Queries</h1>
    
    <br>
    
	<form action ="add1.php" method="post">
		
            Select a major to see which students have declared that particular major <br>
        <select name = 'major'>
            <option value="">Select...</option>
<!--
           	    <option value = '2D ART'>2D Art</option>
                <option value = '3D ART'>3D Art</option>
                <option value = 'BIOLOGY'>Biology</option>
                <option value = 'BUSINESS'>Business</option>
-->
            <?php
            $conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

                // Check connection
                if (mysqli_connect_error())
                    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
                else 
                    { echo nl2br("Established Database Connection \n");}
                    // Check connection
                    if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
                $result = mysqli_query($conn,"SELECT distinct majorid, dept, requiredCredits FROM major ");    
                while ($row = mysqli_fetch_assoc($result)) {                  
                    unset($majorid,$dept,$requiredCredits);   
                    $majorid = $row['majorid']; 
                    $dept = $row['dept'];
                    $requiredCredits = $row['requiredCredits'];
                    echo "<option value= '$majorid'>$majorid</option>";
                }
            ?> 

           	
        </select>
            <br>
            <br>
            <input type='submit' value='Select'>
		
	</form><br>
    
    <form action ="add2.php" method="post">
        
		
            Select building and return all rooms within the building.<br>
        <select name = 'building'>
            <option value="">Select...</option>
            <?php
            $conn=mysqli_connect("db.soic.indiana.edu","i308u18_team04","my+sql=i308u18_team04", "i308u18_team04");

                // Check connection
                if (mysqli_connect_error())
                    {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
                else 
                    { echo nl2br("Established Database Connection \n");}
                    // Check connection
                    if (!$conn) {    die("Connection failed: " . mysqli_connect_error());}    
                $result = mysqli_query($conn,"SELECT distinct buildingName FROM building");    
                while ($row = mysqli_fetch_assoc($result)) {                  
                    unset($building);
                    $building = $row['buildingName']; 
                    echo "<option value= '$building'>$building</option>";
                }
            ?> 

           	
        </select>
            <br>
            <br>
            <input type='submit' value='Select'>
		
	</form><br>
    

</body>
</html>
