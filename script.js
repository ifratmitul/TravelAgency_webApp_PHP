function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  }
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

function employe_validation()
{

    var name  = document.getElementById("eName").value;
    var designation  = document.getElementById("edesignation").value;
    var em = document.getElementById("e_email").value;
    var pass1  = document.getElementById("ep1").value;
    var pass2  = document.getElementById("ep2").value;

    if(name  == "" || name == isNaN()){
        alert("Employe Name can't be empty and can't contain Number.");

    }
    if(designation == "" || designation == isNaN()){
        alert("Must fill Designation and can't contain number.");
    }
    if(em == ""){
        alert("you must fill all the information.");
    
    }
    if(pass1 < 6 || pass1 > 12){
        alert("Password must be within 6 to 12 chracter.");
    }
    if(pass2 != pass1){
        alert("Password Doesn't match.");
    }
}

function blog_validation()
{

    

}
