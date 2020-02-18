<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color: purple
		}
		table{
			background-color: pink;
		}
	</style>
</head>
<body>


<?php # view_users.php
//this script retrievs all the records from the patient table

$page_title= 'View the current users';
include ('header.html');

//page header
echo '<h1> Registered Users</h1>';
require ('mysql-connect.php'); //connect to database

//make the query
$q= "SELECT CONCAT ( last_name, ',', first_name) AS name ,
 DATE_FORMAT(registration_date,'%M %d %Y') 
AS dr FROM patient ORDER BY registration_date ASC";
$r= mysqli_query($dbc, $q); // run the  Query
if ($r) { // if it run ok , display the records
	//Table Header.
	echo '<table width ="60%">
	<thead>
	<tr>
	<th align = "left"> Name</th>
	<th align= "left"> Date Registered</th>
	</tr>
	</thead>
	</tbody>';

	 //fetch and  print all the records
	 while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	 	echo '<tr><td align="left">'. $row['name'].'</td><td align= "left">'. $row['dr'].
	 	'</td></tr>';


	  } 
	  echo '</tbody></table>'; //close the table
	  mysqli_free_result($r); // Free up the resources
}else{ //if it did run ok

	//public message
	echo '<p class = "error"> The current patients could not be retrieved.	We are sorry for the inconvenience.</p>';
	//Debugging message
	echo '<p>' .mysqli_error($dbc) .'<br><br> Query:' .$q. '</p>';	

}//    End of if($r) IF
mysqli_close($dbc); // Close dtabase connection
include ('footer.php');
?>
</body>
</html>