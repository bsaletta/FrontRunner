<?php
$hash=$_GET["hash"];
if($hash!=""){
	$link=mysqli_connect('localhost','root','mfd-2hd','Users');
	if(mysqli_connect_errno()){
	error("Failed to connect to MySQL ".mysqli_connect_error());
	}
	$result=mysqli_query($link,"SELECT * FROM `TempUser` WHERE `Hash`=$hash");
	if($result){
		$row=mysqli_fetch_array($result);
		$uname=$row["Username"];
		$pwd=$row["Password"];
		$email=$row["Email"];	
		$result=mysqli_query($link,"INSERT INTO `UserData` VALUES ($uname,$pwd,$email,true)");
		if($result){
			echo "Verified!";
		}else{
			echo "Could not Verify...";
		}
	}
	
}

function error($error){
	echo $error;
	mysqli_close($con);
	exit;
}
?>