<?php 
include('connection.php');
session_start();

$errors = array();


if(isset($_POST['alogin']))
{


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);



    


        $password = md5($pass);
        $query =  "SELECT * FROM adminList WHERE email = '$email' AND passcode = '$password'";
        $result =  mysqli_query($conn, $query);
        if(mysqli_num_rows($result)){
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged IN";

            if (mysqli_num_rows($result) >0) 
            {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
            $_SESSION['name'] = $row["name"];
            $_SESSION['designation'] = $row["title"];
            }
            }


            header('location: admin.php');
        }
        else{
            //array_push($errors, "Wrong Email or password. Please try again");
            echo "Something is wrong";
        }
    


}


if(isset($_POST['a_regi'])){

    $name = mysqli_real_escape_string($conn, $_POST['ename']);
    $title  = mysqli_real_escape_string($conn, $_POST['etitle']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass =  mysqli_real_escape_string($conn, $_POST['p2']);

    $email_check =   "SELECT * FROM adminList where email = '$email' LIMIT 1 ";
   
    $result = mysqli_query($conn, $email_check);
    $user = mysqli_fetch_assoc($result);
    if($user)
    {
        if ($user['email'] == $email) {
            array_push($errors, "This Email already been used");
            //$_SESSION['existing_email'] = "This email already exist.";
        }

    }

    if (count($errors) == 0)
    {
        $password = md5($pass);


        $sql = "INSERT INTO adminList (name, title, email, passcode )
        VALUES ('$name', '$title', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        //$_SESSION['name'] =  $name;
        $_SESSION['admin_regi'] = "Employee Added to database";
        header('location: admin.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

}




?>