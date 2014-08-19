<!DOCTYPE html>
<?php
$root=pathinfo($_SERVER['SCRIPT_FILENAME']);
define ('BASE_FOLDER', basename($root['dirname']));
define ('SITE_ROOT',    realpath(dirname(__FILE__)));
define ('SITE_URL',    'http://'.$_SERVER['HTTP_HOST'].'/'.BASE_FOLDER);
?>
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
		}
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
			$result=mysqli_query($link,"SELECT * FROM `ProjectOverview` WHERE 1");
			if($result){
				echo "<table border=1px><th>Name</th><th>Summary</th><th>Views</th>";
				while($row=mysqli_fetch_array($result)){
					$xml=simplexml_load_file(SITE_ROOT.$row['Path']."overview.xml");
					if($xml!=FALSE){
					$title=$xml->title;
					$summary=$xml->summary;
					echo '<tr><td>'.$title.'</td><td>'.$summary.'</td><td>'.$row['Views'].'</td></tr>';
					}else echo "couldn't open file";
				echo '</table>';
			}
		}else{
			echo "<h1>YOU DONE GOOFED!!! NO PROJECTS!!".$request."</h1>";
		}
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
