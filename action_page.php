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

//package loading stuff

$query = "SELECT * FROM packagelist ORDER BY id ASC";
$result =  mysqli_query($conn, $query);

//adding to cart.

$message = '';

if(isset($_POST["add_to_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }
  }
 }
 else
 {
  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $_POST["hidden_name"],
   'item_price'  => $_POST["hidden_price"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("location:packages.php?success=1");
}

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    header("location:packages.php?remove=1");
   }
  }
 }
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("location:packages.php?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been clear...
 </div>
 ';
}




?>