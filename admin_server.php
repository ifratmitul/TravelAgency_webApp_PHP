<?php 
include('connection.php');
session_start();

$errors = array();
$loginTime = array();





if(isset($_POST['alogin']))
{


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);



    


        $password = md5($pass);
        $query =  "SELECT * FROM adminlist WHERE email = '$email' AND passcode = '$password'";
        $result =  mysqli_query($conn, $query);
        if(mysqli_num_rows($result)){
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged IN";
            date_default_timezone_set("America/New_York");
            array_push($loginTime, date("h:i:sa"));
            //$_SESSION['time'] = $loginTime[1];
            $cookie_name = "user";
            $cookie_value = date("h:i:sa");
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

            $_SESSION['time'] = $_COOKIE[$cookie_name]; 


            if (mysqli_num_rows($result) >0) 
            {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
            $_SESSION['name'] = $row["name"];
            $_SESSION['designation'] = $row["title"];
            $_SESSION['pic'] =  $row['picture'];
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
    $file = addslashes(file_get_contents($_FILES["aimage"]["tmp_name"])); 

      
	

    $email_check =   "SELECT * FROM adminlist where email = '$email' LIMIT 1 ";
   
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


        $sql = "INSERT INTO adminlist (name, title, email, passcode,picture)
        VALUES ('$name', '$title', '$email', '$password', '$file')";
        if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        //$_SESSION['name'] =  $name;
        $_SESSION['admin_regi'] = "New employee profile added to database";
        header('location: admin.php');
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

}

if(isset($_POST['adpack']))
{

    $ptitle = mysqli_real_escape_string($conn, $_POST['ptitle']);
    $plocation  = mysqli_real_escape_string($conn, $_POST['location']);
    $hotel = mysqli_real_escape_string($conn, $_POST['hotel']);
    $traveler  = mysqli_real_escape_string($conn, $_POST['traveler']);
    $details  = mysqli_real_escape_string($conn, $_POST['pdetails']);
    $file = addslashes(file_get_contents($_FILES["pimage"]["tmp_name"]));
    


    $sql = "INSERT INTO packagelist (title,location, hotel,no_of_traveler, details, picture)
    VALUES ('$ptitle', '$plocation','$hotel', '$traveler', '$details','$file')";
    if (mysqli_query($conn, $sql)) {
    $_SESSION['p'] = "New package successfully added to DB !";    
    header('location: admin.php');
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}



?>