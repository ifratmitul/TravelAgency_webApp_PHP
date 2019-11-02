<?php include ('header.php'); ?>
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>About Us</h2>
                            <p>home . about us</p>
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
              </div>
              <div class = "card-body">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
              </form>

              </div>
              <div class = "card-footer ">
              <h4 class =" container text-center">Or Login With Google</h4>
              <a href="#" >
              <img class = "rounded mx-auto d-block"src="Google.jpg" alt="Sign in with Google" style = "height : 40px; width : 50px;  "></a></div>
            </div>
      
        </div>
        <div class="col-sm-6" style="padding : 20px;">
          <div class ="card">
            <div class= "card-body">
            <h2 class = "container text-center"> Do not miss any of our amazing packages !</h2>
            <h4 class = "text-center">Don't have an account? <button class = "btn btn-default"data-toggle="modal" data-target="#regi_modal"> Register now</button></h4>
            <img src="img/Greece.jpeg" alt="">

              
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
                            <form>

                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">First Name</label>
                                          <input type="email" class="form-control" id="inputEmail4" placeholder="Your First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Last Name</label>
                                          <input type="password" class="form-control" id="inputPassword4" placeholder="Your Last Name">
                                        </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Password</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Minimum 6 Character">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Confirm Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Confirm Password">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress">Address</label>
                                  <input type="text" class="form-control" id="inputAddress" placeholder="block, Street">
                                </div>
                                <div class="form-group">
                                  <label for="inputAddress2">Address 2</label>
                                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment no, floor">
                                </div>


                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>



<?php include ('footer.php'); ?>