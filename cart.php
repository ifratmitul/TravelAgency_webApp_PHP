                  <!-- Cart modal start -->

                  <div class="modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Booking Cart </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

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
                                        <button class = "btn btn-primary btn-block " float = "right">Pay now</button>
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
                    </div>
                  </div>                     


                  <!-- Cart modal end  -->