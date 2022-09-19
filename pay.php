<?php
session_start();
if (isset($_POST['pay'])) {
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $ref = substr(rand(0, time()), 0, 10);

    //* Prepare our linbo request
    $request = [



        'kind' => 'payout',
        'phone' => '256780347929',
       // 'phone' => '256753446252',
        'amount' => '10000',
        'reference' => $ref,
        'narration' => 'fun way to collect',
        'pay_type' => 'mobilemoney'

        // 'email' => 'ssegodfrey171@gmail.com',
        // 'password' => '3aJyDmEEvW'

    ];

    //* Ca;; f;iterwave emdpoint
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test.developer.limbopay.com/v1/transactions/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer vctyuNYLEYGkQUJggBSxXjF3tevyxiUhta553q31Ap_109q-oo9ImuTWG4BYKfadJOx7uZpOpZWxiDw57hqVRQ==',
            'Content-Type: application/json'
        ),

    ));

    $response = curl_exec($curl);



    $res = json_decode($response);
    //$uuid = $res->uuid;
    $uuid = $res->uuid;
//     echo '<pre>';
//     var_dump($res);
//     echo '</pre>';
//    //  echo $res1->status;
//      exit();
    //echo $uuid;
    //exit();
    if ($res->status == 'created') {
        echo 'Wait for a prompt and enter your pin on your phone';
        //header('Location: process.php');

        if (ob_get_level() == 0) ob_start();

        for ($i = 0; $i < 10; $i++) {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://test.developer.limbopay.com/v1/transactions/?uuid={$uuid}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer vctyuNYLEYGkQUJggBSxXjF3tevyxiUhta553q31Ap_109q-oo9ImuTWG4BYKfadJOx7uZpOpZWxiDw57hqVRQ=="
                ),
            ));

            $response1 = curl_exec($curl);
            curl_close($curl);

            $res1 = json_decode($response1);
        //     //$status1 = $res1->status;
        //     echo '<pre>';
        //   // var_dump($res1->results[0]->meta->channel_initiate_meta->status);
        //    var_dump($res1);
        //    echo '</pre>';
        //   // echo $res1;
        //    exit();

            $res1 = $res1->results[0]->status;
            echo $res1;
           // exit();

            
           //use ifs
            // if ($res1 == 'initiated') {

            //     echo "Enter pin to confirm the payment";
            //     //var_dump($response);
            //     // exit();                

            // } else {
            //     echo "error";
            //    break;
            // }

            // if ($res1 == 'succes') {

            //     echo "success";php
            //     //var_dump($response);
            //     // exit();

            // } else {
            //    break;
            // }

            

            // echo "<br>";
            // echo 'enter your pin on your phone';
            // echo str_pad('',4096)."\n";    

            ob_flush();
            flush();
            sleep(20);
        }

        echo "Done.";

        ob_end_flush();
       // exit();
    } else {
        echo 'We can not process your payment';
    }
}
