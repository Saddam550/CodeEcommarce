<?php

    $transactionId = $_GET['transactionId'];
    $paymentAmount = $_GET['paymentAmount'];
    $paymentFee = $_GET['paymentFee'];

    $transaction_id_edokanpay = $transactionId;

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://pay.edokanpay.com/verify.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('transaction_id' => $transaction_id_edokanpay),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    
    if($response == 1){
    	echo "success";
    }else{
         echo "Failed. Id Not Match";
    }

?>