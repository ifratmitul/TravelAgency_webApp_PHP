<?php include ('header.php'); ?>

<style>
#pro{
    padding: 80px;
}

#p_card
{

    margin: 0 auto;
    float: none;
    padding: 30px;
    max-width: 940px;

}
#p_card .card-body{
    padding: 30px;
}
#pic{

    height: 250px;
    width: 250px;


}
   
</style>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Profile</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb ends-->
        <!-- Profile card starts-->
        <!--  Make sure profile cards contain padding of 80px around it.-->
        <section id = "pro">
        <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="" id  = "p_card">
  <div class="row no-gutters">
    <div class="col-md-4">
    <img class="rounded-circle account-img card-img" src="profile.png" id  ="pic">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">Abul Mia</h3>
        <h4>Email: abul@kuddus.com</h4>
        <button class = "btn btn-warning">Edit Profile</button>

      </div>
    </div>
  </div>
</div>

        </section>

       
 
        
        <!-- Profile card ends-->

  
    <!-- footer part start-->
    <?php include ('footer.php'); ?>