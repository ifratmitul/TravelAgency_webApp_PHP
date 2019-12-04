<?php 
    

include ('connection.php');
session_start();

if(isset($_POST['u_regi'])){
    $errors = array(); 


    $name  = mysqli_real_escape_string($conn, $_POST['name']);

    $pass  = mysqli_real_escape_string($conn, $_POST['p2']);
    $email  = mysqli_real_escape_string($conn, $_POST['email']);
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 



    //check DB for exisiting Email
    $Email_check = "SELECT * FROM userlist where email = '$email' LIMIT 1 ";
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


        $sql = "INSERT INTO userlist (name,password, email, picture)
        VALUES ('$name', '$password', '$email', '$file')";
        if (mysqli_query($conn, $sql)) {
        $_SESSION['regicom'] = "Registration Successful, you can login now.";    
        header('location: register.php');
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
        $query =  "SELECT * FROM userlist WHERE  password = '$password' AND email = '$email' ";
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
            $_SESSION['fname'] = $row["name"];
            $_SESSION['upic'] = $row['picture'];

            //$_SESSION['lname'] = $row["Lname"];
            }
            }


            header('location: profile.php');
        }
        else{
            //array_push($errors, "Wrong Email or password. Please try again");
            echo "Something is wrong";
        }
    

    

}



if(isset($_POST['adblog']))
{

    $btitle = mysqli_real_escape_string($conn, $_POST['btitle']);
    $blocation  = mysqli_real_escape_string($conn, $_POST['location']);
    $details  = mysqli_real_escape_string($conn, $_POST['bdetails']);
    $file = addslashes(file_get_contents($_FILES["bimage"]["tmp_name"]));
    $email = $_SESSION['uemail'];


    $sql = "INSERT INTO blog (b_title,location, b_details, user_email, image)
    VALUES ('$btitle', '$blocation', '$details','$email', '$file')";
    if (mysqli_query($conn, $sql)) {
    $_SESSION['blogged'] = "your blog is successfully posted !";    
    header('location: profile.php');
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }



}

//cart and package loading stuff

$query = "SELECT * FROM packagelist ORDER BY id ASC";
$result =  mysqli_query($conn, $query);
//$statement = $conn->prepare($query);
//$statement->execute();
//$result = $statement->fetchAll();


//$query =  "SELECT * FROM userlist WHERE  password = '$password' AND email = '$email' ";
//$result =  mysqli_query($conn, $query);




?>