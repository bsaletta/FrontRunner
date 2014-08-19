<?php 
if(!isset($_SESSION["exists"])){
	session_start();
	$_SESSION["exists"]=true; 	
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FrontRunner Projects</title>
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
    </head>
    <body>
    <div id="shader"></div>
    <div id="header">
      <h1 style="text-align:center">FrontRunner Projects</h1>
      <span onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)" id="loginSignup">
      	<?php if(isset($_COOKIE['User'])){
        	echo "Logged in as ".$_COOKIE['User'];
          ?> </span>
    </div>
        <ul id="navigationBar">
            <li><a class="navLink" href="index.php" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">Home</a></li>
            <li><a class="navLink" href="Projects.php" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">Projects</a></li>
            <li><a class="navLink" href="" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">About</a></li>
        </ul>
    <div id="body">
    <?php
    if($_GET["Project"]==""){ 
    	$link=mysqli_connect("localhost","root","mfd-2hd","Projects");
		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL ".mysqli_connect_error();
		}
		$request=mysqli_query($link,"SELECT * From `ProjectOverview");
		if(!$request){
			echo "<table>";
			while($row=mysqli_fetch_array($result)){
				echo '<tr><td>'.$row['Name'].'</td></td>'.'TODO: get synopsis here'.'</td></tr>';
		}
			echo '</table>';
	}else{
		echo "<h1>YOU DONE GOOFED!!! NO PROJECTS!!</h1>";
	}
    ?>    
    </div>
    <div id="footer">
    <i>This website was created by Ben Saletta, if you get inspiration from any ideas on this site and end up making a fortune, all I ask is that you mention where you got the idea</i>
    <p id="jsCheck"><b>Java Script Disabled</b></p>
    </div>
    <div id="error" style="color:red; width:700px; margin-left:auto; margin-right:auto;">
    	
    </div>
        <script type="text/javascript" src="mainscript.js"></script>
        </script>
    </body>
</html>