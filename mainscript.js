document.getElementById("jsCheck").innerHTML="<i>Javascript Loaded</i>"
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