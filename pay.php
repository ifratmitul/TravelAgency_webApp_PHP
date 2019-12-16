<?php 
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
include('start.php');

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID']) ){
    echo "Nothing is set 1";
    //header('location:profile.php');

    die();
    
}

if((bool) $_GET['success'] === false){
    echo "Payment Failed";
    die();
    //header('location:profile.php');
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId, $paypal);


$execute =  new PaymentExecution();
$execute-> setPayerId($payerId);

try{

    $result = $payment->execute($execute, $paypal);
    
} catch (Exception $e) 
{
    $data =  json_decode($e->getData());
    echo $data->message;
    die();

}

echo "payment Successful.";


header('location: profile.php');


?>