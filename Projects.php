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
    $link=mysqli_connect("localhost","root","mfd-2hd","Projects");
			if(mysqli_connect_errno()){
				echo "Failed to connect to MySQL ".mysqli_connect_error();
			}
    if($_GET["Project"]==""){
    		
			$result=mysqli_query($link,"SELECT * FROM `ProjectOverview` WHERE 1");
			if($result){
				echo "<table border=1px><th>Name</th><th>Summary</th><th>Views</th>";
				while($row=mysqli_fetch_array($result)){
					$xml=simplexml_load_file(SITE_ROOT.$row['Path']."overview.xml");
					if($xml!=FALSE){
					$title=$xml->title;
					$summary=$xml->summary;
					echo "<tr><td><a href='Projects.php?Project=".$row['Name']."'>".$title.'</a></td><td>'.$summary.'</td><td>'.$row['Views'].'</td></tr>';
					}else echo "couldn't open file";
				echo '</table>';
			}
		}else{
			echo "<h1>YOU DONE GOOFED!!! NO PROJECTS!!".print_r($result)."</h1>";
		}
	}else{
		$project=$_GET["Project"];
			if($project!=""){
				$result=mysqli_query($link,"SELECT * FROM `ProjectOverview` WHERE `Name`='".$project."'");
				if($result){
					$row=mysqli_fetch_array($result);
					$xml=simplexml_load_file(SITE_ROOT.$row['Path']."overview.xml");
					if($xml!=FALSE){
					$title=$xml->title;
					$summary=$xml->summary;
					$contents=$xml->contents;
					echo "<table border=1px>
						<tr><td></td><td><b>".$title."</b></td><td></td></tr>
						<tr><td><ul>";
						foreach($contents->children() as $kind => $child){
						echo "<li>".$kind.": <span id='".$kind."'onclick=\"loadResource('".SITE_ROOT.$child->path."',this)\">".$child->name."</span></li>";
						}
					echo "</ul></td>
						<td></td>Here will go action commands i.e donate or comment or suggest etc<td></td></tr>
					</table>";
				}
			}else{
				echo "False Result!";
			}
		}else{
		
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
