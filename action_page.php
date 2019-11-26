<?php 
    

include ('connection.php');
session_start();

if(isset($_POST['u_regi'])){
    $errors = array(); 


    $fname  = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname  = mysqli_real_escape_string($conn, $_POST['lname']);
    $pass  = mysqli_real_escape_string($conn, $_POST['p2']);
    $email  = mysqli_real_escape_string($conn, $_POST['email']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);

    if(empty ($fname)) {array_push ($errors, "Fname required");}
    if(empty ($lname)) {array_push ($errors, "Fname required");}
    if(empty ($pass)) {array_push ($errors, "Fname required");}
    if(empty ($email)) {array_push ($errors, "Fname required");}
    if(empty ($address)) {array_push ($errors, "Fname required");}




    //check DB for exisiting Email
    $Email_check = "SELECT * FROM userList where email = '$email' LIMIT 1 ";
    $result = mysqli_query($conn, $Email_check);
    $user = mysqli_fetch_assoc($result);
    if($user)
    {
        if ($user['email'] == $email) {
            array_push($errors, "This Email already been used");
        }

    }

    if (count($errors) == 0)
    {
        $password = md5($pass);


        $sql = "INSERT INTO userList (Fname, Lname, pass, email, address)
        VALUES ('$fname', '$lname', '$password', '$email', '$address')";
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";

        echo "Data enttry Successful";
        //header('location: profile.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


}
   
//login user : 

if(isset($_POST['ulogin']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['pass1']);



    


        $password = md5($passwd);
        $query =  "SELECT * FROM userlist WHERE  pass = '$password' AND email = '$email' ";
        $result =  mysqli_query($conn, $query);
        if(mysqli_num_rows($result)){
            $_SESSION['uemail'] = $email;
            $_SESSION['success'] = "You are now logged IN";
            //date_default_timezone_set("America/New_York");
            //array_push($loginTime, date("h:i:sa"));
            //$_SESSION['time'] = $loginTime[1];
            //$cookie_name = "user";
            //$cookie_value = date("h:i:sa");
            //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

            //$_SESSION['time'] = $_COOKIE[$cookie_name]; 


            if (mysqli_num_rows($result) >0) 
            {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
            $_SESSION['fname'] = $row["Fname"];

            $_SESSION['lname'] = $row["Lname"];
            }
            }


            header('location: profile.php');
        }
        else{
            //array_push($errors, "Wrong Email or password. Please try again");
            echo "Something is wrong";
        }
    

    

}




?>