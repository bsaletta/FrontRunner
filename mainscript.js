document.getElementById("jsCheck").innerHTML="<i>Javascript Loaded</i>";
function linkColorChange(e){
    e.style.backgroundColor="LightBlue";
}
function linkColorChangeBack(e){
    e.style.backgroundColor="white";
}
function hideLogin(){
    document.getElementById("userPanel").style.visibility="hidden";
    document.getElementById("userPanel").style.width="0";
    document.getElementById("userPanel").style.height="0";
    var element=document.getElementById("signup");
    element.style.visibility="hidden";
    element.style.width="0";
    element.style.height="0";
    document.getElementById("shader").style.visibility="hidden";
}
function showLogin(){
    document.getElementById("userPanel").style.visibility="visible";
    document.getElementById("userPanel").style.width="300px";
    document.getElementById("userPanel").style.height="auto";
    document.getElementById("shader").style.visibility="Visible";
}
function toggleSignUp(){
    var element=document.getElementById("signup");
    if(element.style.visibility=="hidden"){
        element.style.visibility="visible";
        element.style.width="300px";
        element.style.height="auto";
    }else{
       element.style.visibility="hidden";
       element.style.width="0";
       element.style.height="0"; 
    }
}
function ajax(cmd,args){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	switch(cmd){
		case 0:
			xmlhttp.open("POST","user.php",true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			var uname=document.getElementById('uname').value;
			var pwd=document.getElementById('pwd').value;
			var string="?uname="+uname+"&pwd="+pwd;
			xmlhttp.send(string);
			xmlhttp.onreadystatechange=ajaxResponseToError(xmlhttp);
		break;
		case 1:
			xmlhttp.open("POST","user.php",true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			var suname=document.getElementById("suname").value;
			var email=document.getElementById("email").value;
			var sup1=document.getElementById("sup1").value;
			var sup2=document.getElementById("sup2").value;
			var string="?suname="+suname+"&email="+email+"&sup1="+sup1+"&sup2="+sup2;
			xmlhttp.send(string);
			xmlhttp.onreadystatechange=ajaxResponseToError(xmlhttp);
		break;
		default:
			error("Unhandled AJAX case");
	}
}
function ajaxResponseToError(xmlhttp){
		if(xmlhttp.readystate==4 && xml.status==200){
					 error(xmlhttp.responseText);
				}else if(xmlhttp.status!=200 && xmlhttp.readystate==4){
					error("404: Could not locate request");
				}
}
function error(issue){
	var element=document.getElementById('error');
	if(issue!=""){
		element.innerHTML+=new Date().getTime()+"   "+issue+"<br>";
	}else{
		element.innerHTML+=new Date().getTime()+"   "+"Blank Problem"+"<br>";
	}
}
