function sendbutton(){
    document.getElementById("send").disabled=false;
}

function sendallbutton(){
    document.getElementById("sendall").disabled=false;
}

function emptyinput1(){
   var msg= document.getElementsByClassName("sendmsg1").value.length;
   if(msg==0){
    document.getElementById("send").disabled=false;
   }
}

function emptyinput2(){
    var msg= document.getElementsByClassName("sendmsg2").value.length;
    if(msg==0){
     document.getElementById("sendall").disabled=false;
    }
 }