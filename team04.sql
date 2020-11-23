SELECT c.courseNum AS Course, t.grade AS Grade, sem.title, SUM(c.creditHours) AS Credits, ROUND((SUM(g.gpaPoints)/COUNT(g.gpaPoints)),2) AS GPA
FROM student AS st, transcript AS t, section AS s, course AS c, semester AS sem, gradescale AS g
WHERE st.uniqueid = t.studentid
AND s.courseid = c.courseNum
AND st.fname = 'Thayne'
AND s.semesterid = sem.semesterid
AND t.sectionid = s.sectionid
AND t.grade = g.letterGrade
GROUP BY c.courseNum WITH ROLLUP;

SELECT s.roomid AS Room
FROM faculty AS f, course AS c, section AS s, room_feature AS rs
WHERE rs.feature ='Laboratory' AND rs.roomid =s.roomid AND f.uniqueid=s.facultyid AND s.courseid =c.courseNum AND c.title != 'Data'
GROUP BY Room;

SELECT CONCAT(f.fname,' ',f.lname) AS 'Name'
FROM faculty AS f
Where Not Exists
            (SELECT f.uniqueid as 'ID' 
            FROM course as c, section as s
            WHERE c.coursenum = 'BIO-C 300'
                           AND s.facultyid = f.uniqueid
                           AND c.courseNum = s.courseid
GROUP BY 'ID')
ORDER BY 'Name' Desc;


SELECT c.courseNum AS Course, t.grade AS Grade, sem.title, SUM(c.creditHours) AS Credits, ROUND((SUM(g.gpaPoints)/COUNT(g.gpaPoints)),2) AS GPA
FROM student AS st, transcript AS t, section AS s, course AS c, semester AS sem, gradescale AS g
WHERE st.uniqueid = t.studentid
AND s.courseid = c.courseNum
AND st.uniqueid = '$studentid
AND s.semesterid = sem.semesterid
AND t.sectionid = s.sectionid
AND t.grade = g.letterGrade
GROUP BY c.courseNum WITH ROLLUP

SELECT CONCAT(st.fname,' ',st.lname) AS StudentName, sm.majorid AS Major
FROM student_advisor AS sa, advisor AS a, student AS st, student_major AS sm
WHERE a.uniqueid=sa.advisorid 
AND a.fname='Brittni' 
AND sa.studentid=st.uniqueid 
AND st.uniqueid = sm.studentid
ORDER BY StudentName;

SELECT DISTINCT m.majorid AS Major, CONCAT(st.fname, ' ', st.lname) AS Name, SUM(DISTINCT c.creditHours) AS Credits, ROUND((SUM(g.gpaPoints)/COUNT(g.gpaPoints)),2) AS GPA
FROM student AS st, transcript AS t, section AS s, course AS c, semester AS sem, gradescale AS g, major AS m, student_major as sm
WHERE st.uniqueid = t.studentid
AND s.courseid = c.courseNum
AND s.semesterid = sem.semesterid
AND t.sectionid = s.sectionid
AND t.grade = g.letterGrade
AND m.majorid = sm.majorid
AND st.uniqueid = sm.studentid
GROUP BY Name;

SELECT CONCAT(s.lname, ', ', s.fname) as 'Name'
FROM student AS s, student_major AS m
WHERE m.studentid = s.uniqueid AND m.majorid = '$major';

SELECT roomid AS Room
FROM building AS b, room as r
WHERE b.buildingid = r.building 
AND b.buildingName = '$building';
