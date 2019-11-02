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
    <!-- breadcrumb start-->

    <!-- Form  start-->
    <div class = "card container" id="regi"> 
        <div class = "card-body">

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

                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                              Check me out
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary align-items-center" >Register</button>
                      </form>
                

        </div>
    </div>
        <!-- Form  End-->


<?php include ('footer.php'); ?>