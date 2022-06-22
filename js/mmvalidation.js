function validatemobile() {
    var mobile = document.getElementById('mobile').value;
    var errormsg = document.getElementById('errmobile');
    if (mobile.length < 10) {
        errormsg.innerHTML = "Note : Mobile number must be 10 didgits";
        errormsg.style.color = "red";
    } else {
        errormsg.innerHTML = "Entered mobile number is valid";
        errormsg.style.color = "green";
    }
}

function validateemail() {
    var email = document.getElementById('email').value;
    var errormsg = document.getElementById('erremail');
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        errormsg.innerHTML = "Email is valid ";
        errormsg.style.color="green";
    } else {
        errormsg.innerHTML = "Please enter valid email";
        errormsg.style.color = "red";
    }

}