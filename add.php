<?php
 if(!isset($_SERVER['PHP_AUTH_USER'])){
 	header("WWW-Authenticate: Basic realm='This is a Private admin page'");
	header('HTTP/1.0 401 Unauthorized');
	echo "<a href='index.php'>please return to the main page</a>";
	exit;
 }else{
 	$link=mysqli_connect("localhost","root","mfd-2hd","Users");
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL ".mysqli_connect_error();
	}else{
		$result=mysqli_query($link,"SELECT * FROM `UserData` WHERE `Username`=".$_SERVER['PHP_AUTH_USER']);
		if($result===FALSE){
			header("Location:http://google.com");
		}else{
			$row=mysqli_fetch_array($result);
			if($row['Password']==$_SERVER['PHP_AUTH_PW']){
				
			}else{
				header("Location:http://google.com");
			}
		}
	}
			
 }
 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add or Adjust a Project</title>
		<link rel="stylesheet" href="add.css">
	</head>
	<body>
		<div id="container">
			<div id="leftPanel">
				<ul>
					<li><span class="selector">Create new post</span></li>
					<li><span class="selector">Upload new file</span></li>
					<li><span class="selector">Create new project</span></li>
				</ul>
			</div>
			<div id="body">
						No content yet.
			</div>
		</div>
		
		<!-- TODO: add functionality, make this a place to update change or do what ever to projects
			Require user verification and all of that good stuff too please thanks!-->
	</body>
	<script src="add.js"></script>
</html>