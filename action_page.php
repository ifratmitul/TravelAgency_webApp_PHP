<?php 


include ('connection.php');


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

    //$fname  = $_POST["fname"];
    //$lname  = $_POST["lname"];
    //$pass = $_POST["p2"];
    //$email  = $_POST["email"];
    //$address  = $_POST["address"];
    


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

        //Neeed to change pic t varchar and at this moment Address is going into pic colm.
        $sql = "INSERT INTO userList (Fname, Lname, pass, email, pic)
        VALUES ('$fname', '$lname', '$password', '$email', '$address')";
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        $_SESSION['fname'] =  $fname;
        $_SESSION['success'] = "You are now logged in";
        echo "Data enttry Successful";
        //header('location: profile.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }


}
   
//login user : something is wrong here. Need to rebuild USERLIST DB again.
    if(isset($_POST['login_user']))

    {
        $errors = array(); 
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass1']);


        if(empty($email)){
            array_push($errors, "Email is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }

        if (count($errors ) == 0){
            $password = md5($pass);
            $query =  "SELECT * FROM userList WHERE email = '$email' AND pass = '$password'";
            $result =  mysqli_query($conn, $query);
            if(mysqli_num_rows($result)){
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "You are now logged IN";
                header('location: profile.php');
            }
            else{
                array_push($errors, "Wrong Email or password. Please try again");
                echo "Something is wrong";
            }
        }
    }

    //adminlogin

    if(isset($_POST['admin_login']))
    {

    }




?>