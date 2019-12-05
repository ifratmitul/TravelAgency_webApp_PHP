<?php

$q = $_REQUEST["q"];

$con = mysqli_connect('localhost','root','','MainDB');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM packagelist WHERE location LIKE '%$q%'";
$result = mysqli_query($con,$sql);

?>
<section class="hotel_list section_padding single_page_hotel_list">

    <div class="container">



            <div class="row">
            <?php
        foreach( $result as $row)
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
                        <small id="emailHelp" class="form-text text-muted">If two person want to visit eneter quantity 3</small>
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