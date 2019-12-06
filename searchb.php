<?php 

include ('connection.php');
$q = $_REQUEST["q"];



mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM blog WHERE location LIKE '%$q%'";
$resultb = mysqli_query($conn,$sql);


?>




<section class="blog_area section_padding">
        <div class="container">
        <?php
            foreach( $resultb as $row) //This variablls are decalred in the action_page. you need to change this variable based on the query u do in search page
            {

                ?> 


            
                
                    <div class="blog_left_sidebar">
                        

                        <article class="blog_item">

                            <div class="blog_item_img">
                            <?php echo '<img class ="card-img rounded-0" src = "data:image/jpeg;base64,'.base64_encode($row["image"]).'" > '  ?>
                            </div>

                            <div class="blog_details">
                                    <h2><?php echo $row["b_title"]; ?></h2>
                                    <h4>Location:<?php echo $row["location"]; ?></h4>
                                    <h5>Posted by:<?php echo $row["user_email"]; ?></h5>
                                
                                <p> Details: <?php echo $row["b_details"]; ?></p>
                                
                            </div>
                        </article>

                      

                    </div>

                    <?php
                      }
                    ?>
                

            
        </div>
    </section>