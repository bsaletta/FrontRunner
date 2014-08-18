<?php
$con=mysqli_connect("localhost","root","mfd-2hd","Users");
if(mysqli_connect_errno()){
	error("Failed to connect to MySQL ".mysqli_connect_error());
}
echo "Connected to MySQL";
if($_POST["?uname"]=="" || $_POST["pwd"]==""){
	$signup=true;
	echo "Signing Up";
}else{
	$signup=false;
	echo "Logging in";
}
if($signup){
	$suname=$_POST["?suname"];
	$email=$_POST["email"];
	if($_POST["sup1"]==$_POST["sup2"]){
		$pwd=$_POST["sup1"];
		echo "Passwords good";
	}else{
		error("Missmached Passwords");
	}
	$result=mysqli_query($con, "SELECT * FROM `UserData` WHERE `Username`=".$suname);
	if(!$result){
		$email=$_POST["email"];
		$result=mysqli_query($con, "SELECT * FROM `UserData` WHERE `Email`=".$email);
		if(!$result){
			$hash=hash("md5",Math.rand(0, 100));
			$result=mysqli_query($con,"INSERT INTO `TempUser` VALUES ('$suname','$pwd','$email','$hash');");
			if($result){
				//TODO: Design message in file and load it here, the below is strictly for testing
				$message="<html><a href='192.168.1.72/verify.php?hash=$hash'>192.168.1.72/verify.php?hash=$hash</a></html>";
				mail($email,"Verify your FrontRunner Account",$message);
				echo "Values inserted";
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
	$result=mysqli_querry($con,"SELECT * FROM `UserData` WHERE `Username`=".$uname);
	if(!$result){
		error("Wrong Username");
	}else{ 
	$row=mysqli_fetch_array($result);
	if($row["Verified"]==0){
		error("Unverified Email");
	}else{
		if($row["Password"]==$_POST["pwd"]){
			$_SESSION["User"]=$uname;
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
