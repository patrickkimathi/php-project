<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css">
	body {
		background-color:  purple;
	}
</style>


<?php // register.php

$page_title= 'Register';
include ('header.html');

//Check form submission
if ($_SERVER['REQUEST_METHOD']== 'POST'){ 
	//require ('mysqli_connect.php');  //connect to the db

$errors= []; //initialize an error array

//check for the firs name
if (empty($_POST['first_name']))
 {
 	$errors[] = 'You forgot your first name';
 }else {
 	$fn=trim($_POST['first_name']);
 }
 //check for the lastname
 if (empty($_POST['last_name'])) {
 	$errors[]='You forgot your lastname';
 } else{
 	$ln= trim($_POST['last_name']);
 }
 // check for email
 if (empty($_POST['email'])) {
 	$errors[]='your forgot to enter yoru email';
 }else{
 	$e = trim($_POST['email']);

 }
 // check for password
 if (!empty($_POST['pass1'])){ 
 	if ($_POST['pass1'] !=$_POST['pass2']){
 		$errors[]='YOur password did not match ';

 		}else{
 			$p= trim($_POST['pass1']);
 		}
 	}
 }else {
 	$errors[]='You forgot to enter your password';

 }
 if (empty($errors)){ //if everything is okey
 	//register the user in the database

 	require(   'mysql-connect.php'); // connect to the db
 	// make the query
 	$q= "INSERT INTO patient ( first_name, last_name, email, password, registration_date)
 	VALUES('$fn' ,'$ln', '$e', SHA2('$p', 512), NOW())";
 	$r= mysqli_query($dbc,  $q); // Run the query

 	if ($r) {// if it run ok
 		//print message
 		echo '<h1>Thank you!/h1><p> You are now registered </p><p><br></p>';
 	}else{// if it did not run ok
 		// print message
 		echo '<h1> System error</h1>
 		<p class= "error"> You could not be registered due to system error. We apologise any inconvenience.</p>';

 		// Debugging messsage
 		echo '<p>'.mysqli_error($dbc) .'<br><br> Query: '.$q .'</p>';
 	}

 	mysqli_close($dbc); // close database connection

 	// include the footer and quit script
 	include 'footer.php';
 	exit();
 }else{ //report errors.
 	echo '<h1>Error!</h1>
 	<p class="error">The following errors occurred:<br>';
 	foreach ($errors as $msg) { //print each error.
 		echo "- $msg<br>\n";
 	}
 	echo '<p>Please try again</p><p><br></p>';

 } // end of if(empty($erroors)) IF
 //End of main Submit conditional.
 ?>
 


 <h1>Register</h1>
 <form action = " " method="post">
 <p>First Name: <input type ="text" name= "first_name" maxlength= "40" value= "<?php
 if( isset($_POST['first_name'])) echo $_POST['first_name'];?>" </p>

 <p>Last  Name:<input type ="text" name= "last_name" maxlength= "40" value= "<?php
 if( isset($_POST['last_name '])) echo $_POST['last_name'];?>"</p>

 	 <p>Email address <input type= "email" name="email" size= "20" maxlength="50" value="<?php
 if( isset($_POST['email'])) echo $_POST['email'];?>"</p>

 	 <p>Password: <input type ="password" name="pass1" size= "20" maxlenght= "40" value="<?php
 if( isset($_POST['pass1'])) echo $_POST['pass1'];?>"</p>

 	 <p> Confirm Password:<input type ="password" name="pass2" size= "20" maxlength= "40" value= "<?php
 if( isset($_POST['pass2'])) echo $_POST['pass2'];  ?>" </p>
 <p> <input type= "submit"  name= "submit"  value= "Register"></p>
 </form>
 <?php include "footer.php"; ?>
 </p></body>
 </html>

