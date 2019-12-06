<?php include ('header.php'); 

$query = "SELECT * FROM blog ORDER BY id ASC";
$resultb =  mysqli_query($conn, $query);



?>

            <style>
            .nav-item{
            padding-left : 5px;
            padding-right : 5px;
            }
            </style>

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
            xmlhttp.open("GET", "searchb.php?q=" + str, true);
            xmlhttp.send();
        }
    }
  </script>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>blog</h2>
                            <p>home . blog</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <nav class="navbar navbar-expand-sm bg-light justify-content-center " id  = "snav"><h4 style = "padding: 5px;">Find different Blog based on location</h4>  
    <ul class="navbar-nav">
    <li class="nav-item">
    <form action="">
        <div class="form-group">

        <input type="text" class="form-control" id="usr" onkeyup="showHint(this.value)" placeholder = "Search with location name">
        </div>
        </form>


    </li>

    <li class="nav-item" >

    <?php if(isset($_SESSION['uemail']))
         {  ?>
          <button class = "btn btn-info" data-toggle="modal" data-target="#myModal" > Create your own Blog</button>
          <?php }else
           {
           ?> <a class="nav-link" href="register.php">Login To create your own blog</a><?php
            } 
        ?>



    </li>

  </ul> 

   

    </nav>
	
	
	

    <!--================Blog Area =================-->
    <p><span id="txtHint"></span></p>
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
    <!--================Blog Area =================-->


    <?php include ('footer.php'); ?>



    <!-- Modal area-->


                      <!-- Modal -->
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Create your Blog</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <form id = "adblg" method = "post" action = "action_page.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for="exampleFormControlInput1">Blog Title</label>
                                          <input type="text" name = "btitle" class="form-control" id="p_title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                          <label for="exampleFormControlSelect1">Location</label>
                                          <select class="form-control" name = "location" id="p_location" required>
                                          
                                            <option name ="location1" >Bangladesh</option>
                                            <option name ="location2" >Australia</option>
                                            <option name ="location3" >America</option>
                                            <option name ="location4" >Europe</option>
                                            <option name ="location5" >Asia</option>
                                          </select>
                                        </div>

                                        
                                        <div class="form-group">
                                          <label for="exampleFormControlTextarea1">Details</label>
                                          <textarea class="form-control" name = "bdetails" id="p_details" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                                <label for="exampleFormControlFile1">Add Location Picture</label>
                                                <input type="file" name ="bimage" class="form-control-file" id="exampleFormControlFile1" required>
                                              </div>

                                      </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name = "adblog"form = "adblg" onclick = "pack_validation()"class="btn btn-primary">Post</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  
                  <!--modal-->