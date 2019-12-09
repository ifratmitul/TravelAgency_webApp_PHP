<?php 

require 'vendor/autoload.php';
define('SITE_URL', 'http://localhost/Travel_Front-End/');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'Ab2bCLoV-TSmFNmYzuKh2-AvqylWFEUAvZaKJhMGwU9zlQsHzd19JhrTXGBKJ9NISlIBbOustpdBgPFe',
        'EPmzA8x9DZolQL9lldvljr9ufdNOTnDp5edXfCDNNlvJdLib5xqrGSeWhJxR24z2y2l-CJiIBrerdq5K'
        )
    );

?>