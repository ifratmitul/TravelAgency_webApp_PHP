<?php include ('header.php'); ?>

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
    <li class="nav-item" >

    <button class = "btn btn-info " > Create your own Blog</button>

    </li>

  </ul> 

   

    </nav>
	
	
	

    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            
                
                    <div class="blog_left_sidebar">
                        

                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="img/bali.jpeg" alt="" >
                                
                            </div>

                            <div class="blog_details">
                                    <h2>My Experince on bali Trip</h2>
                                    <h4>Location: Bali, Indonesia</h4>
                                
                                <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                    he earth it first without heaven in place seed it second morning saying.</p>
                                <ul class="blog-info-link " style = "float : right;">
                                    <li><button class = "btn btn-sm btn-warning"> See More</button></li>

                                </ul>
                            </div>
                        </article>

                      
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                

            
        </div>
    </section>
    <!--================Blog Area =================-->


    <?php include ('footer.php'); ?>