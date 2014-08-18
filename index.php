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
      <a onClick="showLogin()" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)" id="loginSignup">
      	<?php if(isset($_SESSION['User'])){
        	echo "Logged in as ".$_SESSION['User'];
        	}else{
        		echo "Login/SignUp";
        	}  ?> </a>
    </div>
        <ul id="navigationBar">
            <li><a class="navLink" href="drive:drive/root/FrontRunner/index.html" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">Home</a></li>
            <li><a class="navLink" href="" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">Projects</a></li>
            <li><a class="navLink" href="" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">About</a></li>
        </ul>
    <div id="userPanel">
    <a onClick="hideLogin()" class="closeWindowX">X</a>
        <form id="login">
        <table>
        <tr>
            <td>Username:</td><td><input type="textbox" id="uname"></td>
        </tr>
        <tr>
            <td>Password:</td><td><input type="password" id="pwd"></td>
        </tr>
        </table>
        <input type="button" onclick="ajax(0,null)" value="Login"><a onClick="toggleSignUp()" style="text-align:right; display:block">Sign Up</a>
        </form>
       
        <form id="signup">
        <hr>
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="textbox" id="suname"></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="email" id="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="sup1"></td>
            </tr>
            <tr>
                <td>Verify Password:</td>
                <td><input type="password" id="sup2"></td>
            </tr>
        </table>
            <input type="button" onClick="ajax(1,null)" value="Sign Up"><br>
        </form>
    </div>
    <div id="body">
        <p> Welcome to FrontRunner projects, this is a place for me to brain dump all of the ideas that I have on to you poor unsuspecting people. Thanks for putting up with me!. By the way this is the boddy section of the site and this text is mainly here so I have something kinda long, but not like too long for formatting purposes. So all of you aformentioned people will not actually be able to read thes wonderful words that I am writing!. There, I think thats just about long enough for my current purposes. Enjoy and I hope you never read this!</p>
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