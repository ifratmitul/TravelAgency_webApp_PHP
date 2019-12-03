<?php 
include ('action_page.php');

session_destroy();
unset($_SESSION['uemail']);
//header_remove('uemail');
header('location: index.php');





?>