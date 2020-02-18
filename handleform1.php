<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form FeedBack</title>
	<style type="text/css">
		.error{
			font-weight: bold;
			color: #red;

		}
	</style>

</head>
<body>
	<?php # handle form1.php

	// Validate the name
	if (!empty($_REQUEST['name'])) {
		$name= $_REQUEST['name'];

	}else{
		$name= NULL;
		echo '<p class ="error">You forgot to enter your name!</p>';
	}
	//Validate email
	if (!empty($_REQUEST['email'])) {

		$email= $_REQUEST['email'];
	}else{
		$email= NULL;
		echo '<p class = "error">You forgot to enter you email</p>';
	}

	//Validate comments
	if (!empty($_REQUEST['comments'])) {
		$comments = $_REQUEST['comments'];
		
	}else{
		$comments = NULL;
		echo '<p class = "error"> You forgot write your comments</p>';
	}
	//VALIDATE GENDER
	if (isset($_REQUEST['gender'])) {
		$gender= $_REQUEST['gender'];
	}
	if ($gender=='M') {
		$greeting='<p><strong> Good Day Sir!</p></strong>';
		# code...
	}elseif ($gender=='F') {
		$greeting='<p><strong>Goood Day Madam</p></strong>';
		# code...
	}else{ // unaccepted value
		$gender==NULL;
		echo '<p class=="error>Gender should be either "M"or "F"</p>';
	}

	//IF EVERYTHING IS OKEY 
	if ($name && $gender && $email && $comments) {
		echo "<p>Thank  you, <strong>$name</strong>\n, For your comments<strong>$comments</strong>\n, We will reply to you at<em> $email</em>";
		echo $greeting;
	}
	else{ //Missing form valuew22
		echo '<p class== "error"> Please go back and fill out the form again</p>';

	}


?>
</body>
</html>