<?php
$amount = $_POST['amount'];

$apikey = "6411c883c03bc"; //Your Api Key
$clientkey = "6411c883c1477"; //Your Client Key
$secretkey = "1311262420"; //Your Secret Key

$cus_name = $_POST['full_name'];
$cus_email = $_POST['email_add'];

//success url
$success_url = "http://localhost/CodeEcommarce/payment%20system/payment_success.php";
//cancel url
$cancel_url = "http://localhost/CodeEcommarce/payment%20system/payment_Cancel.php";
$hostname = "http://localhost/CodeEcommarce";

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://pay.edokanpay.com/checkout.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('api' => $apikey, 'client' => $clientkey, 'secret' => $secretkey, 'amount' => $amount, 'position' => $hostname, 'success_url' => $success_url, 'cancel_url' => $cancel_url, 'cus_name' => $cus_name, 'cus_email' => $cus_email),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response . "not";