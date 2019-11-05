
function regi_validation()
{

    var fn = document.getElementById("Fname").value;
    var ln = document.getElementById("Lname").value;
    var p1  = document.getElementById("pass1").value;
    var p2 = document.getElementById("pass2").value;
    var em = document.getElementById("r_email").value;
    var ad = document.getElementById("add").value;

    if (fn == ""|| ln == "" || fn  == isNaN() || ln == isNaN()){
        window.alert("Must fill First and Last Name and it can't contain number")
    }
    
    if( p1 < 6 || p1 > 12){
        window.alert("Password must be within 6 to 12 character");
    }
    if (p1 != p2){
        window.alert("Password doesn't match.");
    }
    if(em == ""){
        window.alert("Email field is empty");
    }
    if(ad = ""){
        window.alert("you must fill in your address details");
    }

}


function  pack_validation(){
    var pname = document.getElementById("p_title").value;
    var hotel = document.getElementById("p_hotel").value;
    var details =  document.getElementById("p_details").value;


    if(pname == ""){
        alert("Package Must have a Title");
    }
    if(hotel ==""){
        alert("Package Must have hotel details");

    }
    if(details  == ""){
        alert("Please add some details about the package")
    }

}
