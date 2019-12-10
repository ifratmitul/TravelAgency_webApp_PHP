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
        <form action="">
        <div class="form-group">

        <input type="text" class="form-control" id="usr" onkeyup="showHint(this.value)" placeholder = "Search with country name">
        </div>
        </form>
    </li>
    <li class="nav-item">

    </li>




  </ul> 

   

    </nav>

    <script>
    function showHint(str)
    {
        if (str.length == 0)
        {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "search.php?q=" + str, true);
            xmlhttp.send();
        }
    }
  </script>
	
	
    <p><span id="txtHint"></span></p>





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
                    <form  method = "post" action = "action_page.php">
                        <div class="single_ihotel_list">
                    <?php echo '<img  src = "data:image/jpeg;base64,'.base64_encode($row["picture"] ).'"height = "300" > '  ?>
                            <div class="hotel_text_iner">
                            <h3> <?php echo $row["title"]; ?></h3>

                            <p>Location: <?php echo $row["location"]; ?></p>
                            
                            <p>Hotel: <?php echo $row["hotel"]; ?></p>
                            <p>For: <?php echo $row["no_of_traveler"] ?> Person</p>



                            <h5><span>Price $<?php echo $row["Price"]; ?></span></h5>


                            </div>
                            <p>Enter Quantity</p>
                            
                            <input type="text" name="quantity" value="1" class="form-control"  />
                            <small id="emailHelp" class="form-text text-muted">If two person want to visit enter quantity 2</small>
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
                        <h2>Cart</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                                                    <h3>Order Details</h3>
                                        <div class="table-responsive">
                                        <?php echo $message; ?>
                                        <div align="right">
                                            <a href="index.php?action=clear"><b>Clear Cart</b></a>
                                        </div>
                                        <table class="table table-bordered">
                                            <tr>
                                            <th width="40%">Item Name</th>
                                            <th width="10%">Quantity</th>
                                            <th width="20%">Price</th>
                                            <th width="15%">Total</th>
                                            <th width="5%">Action</th>
                                            </tr>
                                        <?php
                                        if(isset($_COOKIE["shopping_cart"]))
                                        {
                                            $total = 0;
                                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                            $cart_data = json_decode($cookie_data, true);
                                            foreach($cart_data as $keys => $values)
                                            {
                                        ?>
                                            <tr>
                                            <td><?php echo $values["item_name"]; ?></td>
                                            <td><?php echo $values["item_quantity"]; ?></td>
                                            <td>$ <?php echo $values["item_price"]; ?></td>
                                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                            <td><a href="packages.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                            </tr>
                                        <?php 
                                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                            }
                                        ?>
                                            <tr>
                                            <td colspan="3" align="right">Total</td>
                                            <td align="right">$ <?php echo number_format($total, 2); ?></td>
                                            <td></td>
                                            </tr>
                                        <?php
                                        }
                                        else
                                        {
                                            echo '
                                            <tr>
                                            <td colspan="5" align="center">No Item in Cart</td>
                                            </tr>
                                            ';
                                        }
                                        ?>
                                        <tr><td colspan = 5> 
                                        <?php if(isset($_SESSION['uemail']))
                                         {  ?>
                                        <button class = "btn btn-warning btn-block " float = "right"><a href="checkout.php">Pay now</a></button>
                                        <?php }else
                                        {
                                        ?> <a class="nav-link alert alert-info" href="register.php">Please login to complete your purchase</a><?php
                                         }
                                        ?>

                                        
                                        
                                        </td></tr>
                                        </table>

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

