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
      <a onClick="showLogin()" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)" id="loginSignup">Login/Sign Up</a>
    </div>
        <ul id="navigationBar">
            <li><a class="navLink" href="drive:drive/root/FrontRunner/index.html" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">Home</a></li>
            <li><a class="navLink" href="" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">Projects</a></li>
            <li><a class="navLink" href="" onMouseOver="linkColorChange(this)" onMouseOut="linkColorChangeBack(this)">About</a></li>
        </ul>
    <div id="userPanel">
    <a onClick="hideLogin()" class="closeWindowX">X</a>
        <form id="login" action="user.php" method="post">
        <table>
        <tr>
            <td>Username:</td><td><input type="textbox" name="uname"></td>
        </tr>
        <tr>
            <td>Password:</td><td><input type="password" name="pwd"></td>
        </tr>
        </table>
        <input type="submit" value="Login"> <a onClick="toggleSignUp()" style="text-align:right">Sign Up</a>
        </form>
       
        <form action="user.php" method="post" id="signup">
        <hr>
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="textbox" name="suname"></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="sup1"></td>
            </tr>
            <tr>
                <td>Verify Password:</td>
                <td><input type="password" name="sup2"></td>
            </tr>
        </table>
            <input type="submit" value="Sign Up"><br>
        </form>
    </div>
    <div id="body">
        <p> Welcome to FrontRunner projects, this is a place for me to brain dump all of the ideas that I have on to you poor unsuspecting people. Thanks for putting up with me!. By the way this is the boddy section of the site and this text is mainly here so I have something kinda long, but not like too long for formatting purposes. So all of you aformentioned people will not actually be able to read thes wonderful words that I am writing!. There, I think thats just about long enough for my current purposes. Enjoy and I hope you never read this!</p>
    </div>
    <div id="footer">
    <i>Synched This website was created by Ben Saletta, if you get inspiration from any ideas on this site and end up making a fortune, all I ask is that you mention where you got the idea</i>
    <p id="jsCheck"><b>Java Script Disabled</b></p>
    </div>
        <script type="text/javascript" src="mainscript.js"></script>
        </script>
    </body>
</html>