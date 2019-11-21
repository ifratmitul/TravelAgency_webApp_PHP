<?php include ('header.php'); ?>

<style>
#pro{
    padding: 80px;
}

#p_card
{

    margin: 0 auto;
    float: none;
    padding: 30px;
    max-width: 940px;

}
#p_card .card-body{
    padding: 30px;
}
#pic{

    height: 250px;
    width: 250px;


}
   
</style>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Profile</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb ends-->
        <!-- Profile card starts-->

<?php 


if(isset($_SESSION['email'])){
    $_SESSION['msg'] = "You Must login to view this page";
    header('location:register.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['fname']);
    header('location: index.php');
}

?>

<?php if(isset($_SESSION['success'])) : ?>
        <h5> 
            <?php 
            
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            
            ?>
        </h5>
        <?php endif ?>

        <!--  Make sure profile cards contain padding of 80px around it.-->
        <section id = "pro">
        <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="" id  = "p_card">
          <div class="row no-gutters">
          <div class="col-md-4">
          <img class="rounded-circle account-img card-img" src="profile.png" id  ="pic">
        </div>
    <div class="col-md-8">

      <div class="card-body">


      <?php if(isset($_SESSION['email'])) : ?>
      <?php
      $pull_data =  $_SESSION['email']; 
      $sql =  "SELECT fname FROM userList WHERE email = '$pull_data'"; 
      ?>
        <h3 class="card-title" id = "uname"><?php echo $_SESSION['fname'];?> </h3>
        <p id = "Email"> <?php echo $_SESSION['email'];?></p>
        <button class = "btn btn-warning">Edit Profile</button>
        <button class = "btn btn-warning"><a href = "index.php?logout = '1'" ></a>Log Out</button>
        <?php endif ?>    
            </div>
            </div>
        </div>
        </div>

        </section>


 
        
        <!-- Profile card ends-->

  
    <!-- footer part start-->
    <?php include ('footer.php'); ?>