<?php
$con=mysqli_connect("localhost","root","mfd-2hd","Users");
if(mysqli_connect_errno()){
	error("Failed to connect to MySQL ".mysqli_connect_error());
}

if($_POST["uname"]=="" || $_POST["pwd"]==""){
	$signup=true;
}else{
	$signup=false;
}
if($signup){
	$suname=$_POST["suname"];
	$email=$_POST["email"];
	if($_POST["sup1"]==$_POST["sup2"]){
		$pwd=$_POST["sup1"];
	}else{
		error("Missmached Passwords");
	}
	$result=mysqli_query($con, "SELECT * FROM `UserData` WHERE `Username`=$suname");
	if(!$result){
		$email=$_POST["email"];
		$result=mysqli_query($con, "SELECT * FROM `UserData` WHERE `Email`=$suname");
		if(!result){
			$hash=hash("md5",Math.rand(0, 100));
			//TODO: Insert into Table here
		}else{
			error("Email already exists");
		}
	}else{
		error("Username already exists.");
	}
}else{
	$uname=$_POST["uname"];
	$result=mysqli_querry($con,"SELECT * FROM `UserData` WHERE `Username`=$uname");
	$row=mysqli_fetch_array($result);
	if(!$row["Verified"]){
		error("Unverified Email");
	}else{
		if($row["Password"==$_POST["pwd"]]){
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

function error($error){
	echo $error;
	mysqli_close($con);
	exit;
}
