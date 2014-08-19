<?php
 if(!isset($_SERVER['PHP_AUTH_USER'])){
 	header("WWW-Authenticate: Basic realm='Master'");
	header('HTTP/1.0 401 Unauthorized');
	echo "Please return to where you came from, this is a private page. Thanks!";
	exit;
 }
 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add or Adjust a Project</title>
	</head>
	<body>
		No content yet.
		<!-- TODO: add functionality, make this a place to update change or do what ever to projects
			Require user verification and all of that good stuff too please thanks!-->
	</body>
	<script src="add.js"></script>
</html>