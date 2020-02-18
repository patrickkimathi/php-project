<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color: green;
		}
	</style>
</head>
<body>
<?php
$page_title = 'WELCOME TO THIS SITE';
echo "$page_title";
include 'header.php';
?>
<div class="page-header"><h1> Content Header</h1></div>
<p>this is where page-specific content goes.</p>
<?php
include 'footer.php';
?>
</body>
</html>