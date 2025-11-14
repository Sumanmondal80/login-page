function data() {
    var a = document.getElementById("fname").value;
    var b = document.getElementById("lname").value;
    var c = document.getElementById("mail").value;
    var d = document.getElementById("phno").value;
    var e = document.getElementById("password").value;
    var f = document.getElementById("cpassword").value;

    if (a == "" || b == "" || c == "" || d == "" || e == "" || f == "") {
        alert("All Fields are mendatory");
        return false;
    }
    else if(d.length<10 || d.length>10){
        alert("Number should be of 10 Digit !!! Please enter a valid Number");
        return false;
    }
    else if(f!=e){
        alert("Please enter same password...");
        return false;
    }
    else{
        return true;
    }
}


