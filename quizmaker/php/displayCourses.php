<?php
	// SET UP THE SQL CONNECTION
	$db_hostname = "localhost";
	$db_database = "quizzler"; 
	$db_username = "s17";
	$db_password = "groupe17";

	// CONNECT TO THE DATABASE
	$db_server = mysql_connect($db_hostname, $db_username, $db_password)
		or die("There was an error connecting to the database:" . mysql_error());

	// SELECT THE DATABASE
	mysql_select_db($db_database)
	    or die("Unable to select database: " . mysql_error());

	$query = "SELECT * FROM courses;";
	$courses = mysql_query($query);

	// $course_num = "SELECT * FROM users WHERE level = 'TA';";
	// $tas = mysql_query($sql);

	while ($row = mysql_fetch_array($courses, MYSQL_ASSOC))
	{
		$course_num = $row['course_num'];
		$course_sched = $row['course_sched'];
		$course_loc = $row['course_loc'];

		echo "<tr>
			<td class=\"span3 align-center\">".$course_num."</td>
			<td class=\"span3 align-center\">".$course_sched."</td>
			<td class=\"span3 align-center\">".$course_loc."</td>
			<td class=\"span3 align-center\">
				<input type=\"button\" class=\"btn btn-primary btn-small\" value=\"Edit\">
			</td>
			<td class=\"span3 align-center\"><a href=\"#\"><i class=\"icon-trash\"></i></a></td>
			</tr>";
	}

	mysql_close();
?>