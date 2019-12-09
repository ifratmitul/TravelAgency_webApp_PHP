<?php

include ('header.php');
?>




<div class= "cotainer">

        <div class = "card">

        <form action = "checkout.php" method ="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Product name</label>
    <input type="text"  name = "product" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" name = "price" class="form-control" id="exampleInputPassword1" placeholder="Price">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

        </div>

</div>