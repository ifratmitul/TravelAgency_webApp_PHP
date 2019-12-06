<?php include ('header.php'); ?>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Login or Sign Up</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb Ends-->

    <!-- Form  start-->
    <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
      <div class="row">
        <div class="col-sm-6" style=" padding: 20px;">
            <div class = "card" style = " padding : 20px">
              <div class = "card-header container">
                <h3 class = "text-center">Already have an accnount? Login</h3>
                <h4> <?php   
                    if(isset($_SESSION['regicom']))
                    {
                      echo $_SESSION['regicom'];
                      unset($_SESSION['regicom']);
                    }
                
                
                ?></h4>
              </div>
              <div class = "card-body">
              <form id ="login_f" method = "post" action = "action_page.php" >
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name  = "email" class="form-control" id="u-email" aria-describedby="emailHelp" placeholder="Enter email" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name ="pass1" class="form-control" id="u-p" placeholder="Password" required>
                </div>
                <h4 id = "error"></h4>

              </form>
              <button type="submit" name= "ulogin" form = "login_f"  class="btn btn-primary float-right">Login</button>
              </div>
              <div class = "card-footer justify-content-center ">
              <h4 class =" container text-center">Or Login With Google</h4>
               <div class = "g-signin2 " data-onsuccess = "onSignIn"></div>
               
              </div>
            </div>
      
        </div>
        <div class="col-sm-6" style="padding : 20px;">
          <div class ="card">
          <img class = "card-img"src="img/Greece.jpeg" alt="">
            <div class= "card-img-overlay">
            <h2 class = "container text-center"> Do not miss any of our amazing packages !</h2>
            <h4 class = "text-center">Don't have an account? <button class = "btn btn-outline-warning"data-toggle="modal" data-target="#regi_modal"> Register now</button></h4>
            

              
            </div>
          </div>
        </div>
      </div>
      <br>

     </div>

    <!-- Form  End-->
    <!-- Registration modal starts here-->
    <div class="modal fade" id="regi_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id = "regi_form" method = "post" action = "action_page.php" enctype="multipart/form-data" >

                            <div class="form-group">
                                  <label for="inputAddress">Name</label>
                                  <input type="text" name = "name" class="form-control" id="add" placeholder="Enter your full name">
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Password</label>
                                    <input type="password" class="form-control" name = "p1" id="pass1" placeholder="Minimum 6 Character">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Confirm Password</label>
                                    <input type="password" class="form-control"  name = "p2" id="pass2" placeholder="Confirm Password">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email</label>
                                    <input type="email" class="form-control" name = "email" id="r_email" placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Add Profile Picture</label >
                                    <input type="file" id ="image" name ="image"class="form-control-file" id="exampleFormControlFile1" >
                                  </div>
                                


                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name = "u_regi" form = "regi_form" onclick = "regi_validation()" value = "Submit"class="btn btn-primary" >Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>



<?php include ('footer.php'); ?>