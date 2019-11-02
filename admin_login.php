<?php include ('admin_header.php'); ?>     
<style>
.card
{ 
        margin: 0 auto;
        float: none;
        padding-bottom: 10px;
}
</style>        
            

                    <div class="card " style=" width: 500px; padding : 50px;" >
                            <div class="card-body">
             
                                 <form>
                                         <div class="form-group">
                                           <label for="exampleInputEmail1">Email address</label>
                                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                         </div>
                                         <div class="form-group">
                                           <label for="exampleInputPassword1">Password</label>
                                           <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                         </div>

                                         <button type="submit" class="btn btn-primary float-right">Log-In</button>
                                       </form>
             
                            </div>
                        </div> 
             

           

            <?php include ('admin_footer.php'); ?>