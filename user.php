<?php
$con=mysqli_connect("localhost","root","mfd-2hd","Users");
if(mysqli_connect_errno()){
	error("Failed to connect to MySQL ".mysqli_connect_error());
}
if($_POST["?uname"]=="" || $_POST["pwd"]==""){
	$signup=true;
}else{
	$signup=false;
}
if($signup===TRUE){
	$suname=$_POST["?suname"];
	$email=$_POST["email"];
	if($_POST["sup1"]==$_POST["sup2"]){
		$pwd=$_POST["sup1"];
	}else{
		error("Missmached Passwords");
	}
	$result=mysqli_query($con, "SELECT * FROM `UserData` WHERE `Username`='".$suname."'");
	if(!$result){
		$email=$_POST["email"];
		$result=mysqli_query($con, "SELECT * FROM `UserData` WHERE `Email`='".$email."'");
		if(!$result){
			$hash=hash("md5",Math.rand(0, 100));
			$result=mysqli_query($con,"INSERT INTO `TempUser` VALUES ('$suname','$pwd','$email','$hash');");
			if($result){
				//TODO: Design message in file and load it here, the below is strictly for testing
				$message="<html><a href='192.168.1.72/verify.php?hash=$hash'>192.168.1.72/verify.php?hash=$hash</a></html>";
				mail($email,"Verify your FrontRunner Account",$message);
			}else{
				error("Could not Log Values into Database");
			}
		}else{
			error("Email already exists");
		}
	}else{
		error("Username already exists.");
	}
}else{
	$uname=$_POST["?uname"];
	$result=mysqli_query($con,"SELECT * FROM `UserData` WHERE `Username`='".$uname."'");
	if($result==FALSE){
		error("Wrong Username");
	}else{
	$row=mysqli_fetch_array($result);
	if($row["Verified"]==0){
		error("Unverified Email");
	}else{
		if($row["Password"]==$_POST["pwd"]){
			$expire=time()+60*60*24;
			setcookie("User",$uname,$expire);
		}else{
			if(isset($_SESSION["Attempts"])){
				$_SESSION["Attempts"]+=1;
			}
			$_SESSION["Attempts"]=1;
			error("Wrong Password");
		}
	}
	}
}
function error($error){
	echo $error;
	mysqli_close($con);
	exit;
}
?>
