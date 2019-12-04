<?php include ('header.php'); 












?>

<style>
.nav-item{
    padding-left : 5px;
  padding-right : 5px;
}
</style>
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Packages</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <nav class="navbar navbar-expand-sm bg-light justify-content-center"><h4 style = "padding: 5px;">Find different Package for different location</h4>  
    <ul class="navbar-nav">
    <li class="nav-item">
    <div class="form-group">
        <select class="form-control" id="sel1">
        <option>Bangladesh</option>
        <option>Hong Kong</option>
        <option>America</option>
        <option>Europe</option>
        </select>

    </div>
    </li>
    <li class="nav-item">
    <button class = "btn btn-primary"> Search</button>
    </li>


  </ul> 

   

    </nav>
	
	
	





    <!-- about us css start-->
    <section class="hotel_list section_padding single_page_hotel_list">

    <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>Find the best package for your</h2>
                        <p>Our packages are desinged to provide you best time of your life within afforable price</p>
                    </div>
                </div>
            </div>
        <div class="container">


                
                <div class="row">
                <?php
            foreach( $result as $row) //This variablls are decalred in the action_page. you need to change this variable based on the query u do in search page
            {

                ?> 

                    <div class="col-lg-4 col-sm-6">
                    <form id = "pack"action="" method = "post">
                        <div class="single_ihotel_list">
                    <?php echo '<img  src = "data:image/jpeg;base64,'.base64_encode($row["picture"] ).'"height = "300" > '  ?>
                            <div class="hotel_text_iner">
                            <h3> <?php echo $row["title"]; ?></h3>

                            <p>Location: <?php echo $row["location"]; ?></p>
                            
                            <p>Hotel: <?php echo $row["hotel"]; ?></p>
                            <p>For: <?php echo $row["no_of_traveler"] ?> Person</p>



                            <h5>Price $<span><?php echo $row["Price"]; ?></span></h5>


                            </div>
                            <p>Enter Quantity</p>
                            
                            <input type="text" name="quantity" value="1" class="form-control"  />
                            <small id="emailHelp" class="form-text text-muted">If two person want to visit eneter quantity 2</small>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
                            <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />


                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-warning" value="Add to Cart" />
                            </form>


                     </div>
                 </div>
             
         



                
                
                
             <?php


            }
            


            ?>
            </div>
</div>
       
    </section>


  
    <!--::industries start::-->
    <section class="best_services section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>We offered best services</h2>
                        <p>Waters make fish every without firmament saw had. Morning air subdue. Our. Air very one. Whales grass is fish whales winged.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="img/services_1.png" alt="">
                        <h3> <a href="#"> Transportation</a></h3>
                        <p>All transportation cost we bear</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="img/services_2.png" alt="">
                        <h3> <a href="#"> Guidence</a></h3>
                        <p>We offer the best guidence for you</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="img/services_3.png" alt="">
                        <h3> <a href="#"> Accomodation</a></h3>
                        <p>Luxarious and comfortable</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="img/services_4.png" alt="">
                        <h3> <a href="#"> Discover world</a></h3>
                        <p>Best tour plan for your next tour</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::industries end::-->
    <?php include ('footer.php'); ?>





        <!-- Modal area-->


                      <!-- Modal -->
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Package Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <h1 class = "text-center"> A Trip to Bali</h1>
                            <div class = "text-center">
                            <img src="img/single_place_4.png" alt="" >
                            </div>
                            <br>

                            <h3>Location: Bali, Indonessia</h3>
                            <h3>Hotel: Inter-Continental</h3>
                            <h3>2 Person per Package</h3>
                            


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  
                  <!--modal-->


 