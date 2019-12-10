<?php include ('admin_header.php'); 

//include('admin_server.php');



if(!isset($_SESSION['email']))
{
  header('location: admin_login.php');
}
 
if(isset($_GET['alogout']))
{
  session_destroy();
  unset($_SESSION['email']);
  header('location: admin_login.php');
}


?>
<style>
.card{
  padding : 60px;

}

.menu{
  padding: 30px;
  padding-left: 60px;

}
</style>

<!------ Include the above in your HEAD tag ---------->





        <div class="card" id = "admin_panel">
               
                <div class="card-body">

                    <div class="content-section">
                        <div class="media">
                        
                          <?php echo '<img class="rounded-circle account-img" src = "data:image/jpeg;base64,'.base64_encode($_SESSION['pic'] ).'" width=" 250" height="250">' ?>
                          <div class="media-body" style="padding-left:25px;">
                            <h2 class="account-heading">Name: <?php  echo $_SESSION['name'];  ?></h2>
                            <p class=" font-weight-bold">Designation: <?php echo $_SESSION['designation']; ?></p>
                            


                            <p><span class="font-weight-bold">Email: <?php echo $_SESSION["email"]; ?></p>
                            <p><span class="font-weight-bold"> Last Login: <?php echo $_SESSION['time']; ?></p>
                            <p> <?php if(isset($_SESSION['admin_regi']))
                                      {
                                        //MSG to show successfull employe profile added to DB
                                        echo $_SESSION['admin_regi'];
                                        unset($_SESSION['admin_regi']);

                                      }   
                                      if(isset($_SESSION['p']))
                                      {
                                        //MSG to show successfull package added to DB
                                        echo $_SESSION['p'];
                                        unset($_SESSION['p']);

                                      }
                              
                              
                              
                              ?> </p>
                            <?php if(isset($_SESSION['success'])) : ?>
                            <h5> 
                                <?php 
                                //MSG to show after succesful login
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                
                                ?>
                            </h5>
                            <?php endif ?>
                                                
                  
                  
                  
                          </div>
                  
                  
                  
                        <div class="menu col-md-4 align-right" >
                          <div class="content-section">
                            <h3>Your Sidebar</h3>
                            <p class='text-muted'>
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Package</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#booking_modal">Booking List</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_modal">User List</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employe_modal">Add Employe</button>
                                <button type="button"   class="btn btn-primary btn-warning"><a href="admin.php?alogout='1'">Logout</a></button>

                            </div>
                                
                            </p>
                          </div>
                        </div>
                        </div>
                  

                </div>


              </div>


              <?php include ('admin_footer.php'); ?>
              <!--This section is modal or pop-up form section-->

              <!--Add package modal starts-->

              
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <form id = "adPackage" method = "post" action = "admin_server.php" enctype="multipart/form-data" >
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Package Title</label>
                                          <input type="text" name="ptitle" class="form-control" id="p_title" placeholder="Title" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect1">Package Location</label>
                                          <select name="location" class="form-control" id="p_location" required>
                                          
                                            <option name = "location1">Bangladesh</option>
                                            <option name = "location2">Hong Kong</option>
                                            <option name = "location3">USA</option>
                                            <option name = "location4">Uk</option>
                                            <option name = "location5">Europe</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Hotel</label>
                                          <input type="text" name="hotel" class="form-control" id="p_hotel" placeholder="Hotel name"required>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Maximum Number of Traveler</label>
                                          <input type="number" name="traveler" class="form-control" id="p_hotel" placeholder="Maximum number of traveler allowed" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Cost</label>
                                          <input type="number" name="price" class="form-control" id="p_hotel" placeholder="Total Amount" required>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Details</label>
                                          <textarea name = "pdetails"class="form-control" id="p_details" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                                <label for="exampleFormControlFile1">Add Location Picture</label>
                                                <input type="file" name="pimage"class="form-control-file" id="exampleFormControlFile1" required>
                                              </div>

                                      </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name ="adpack" form = "adPackage" onclick = "pack_validation()"class="btn btn-primary">Add to Database</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  
                  <!--modal-->

               <!--Package modal ends-->


               <!--Booking List Modal Starts-->
               <div class="modal fade" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Booking History</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>User Name</th>
                                            <th>Booking Date</th>
                                            <th>Email</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                          </tr>
                                          <tr>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                          </tr>
                                          <tr>
                                            <td>July</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                          </tr>
                                        </tbody>
                                      </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>

               <!--Booking List Modal Ends-->
               <!--user List Modal start-->

               <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">User List</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                          </tr>
                                          <tr>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                          </tr>
                                          <tr>
                                            <td>July</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                          </tr>
                                        </tbody>
                                      </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>

               <!-- user List modal ends-->

               <!-- Add Employe Modal Starts-->
               <div class="modal fade" id="employe_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Employe</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <form id = "addEmploye" method = "post" action = "admin_server.php" enctype="multipart/form-data" >
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Employee Name</label>
                                          <input type="text" name ="ename" class="form-control" id="eName" placeholder="First and Last Name" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleFormControlInput1">Employee Designation</label>
                                                <input type="text" name = "etitle" class="form-control" id="edesignation" placeholder="Designation/title" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name = "email" class="form-control" id="e_email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                       </div>
                                        <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name = "p1" class="form-control" id="ep1" placeholder="Password" required>
                                         </div>
                                         <div class="form-group">
                                                <label for="exampleInputPassword1"> Confirm Password</label>
                                                <input type="password" name = "p2" class="form-control" id="ep2" placeholder="Password" required>
                                         </div>
                                        


                                        <div class="form-group">
                                                <label for="exampleFormControlFile1">Add Profile Picture</label >
                                                <input type="file" name ="aimage"class="form-control-file" id="exampleFormControlFile1" required>
                                              </div>

                                      </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name ="a_regi" form = "addEmploye" onclick= "employe_validation()" class="btn btn-primary">Add Employe Details to Database</button>
                        </div>
                      </div>
                    </div>
                  </div>


               <!-- Add Employe Modal Ends-->
   