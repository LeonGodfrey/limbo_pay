<?php 
session_start();

//echo "please wait for a message on your phone and enter your pin!";
    // if(isset($_GET['status']))
    // {
    //     //* check payment status
        // if($_GET['status'] == 'cancelled')
        // {
            // echo 'YOu cancel the payment';
            //header('Location: index.php');
        //}
        // elseif($_GET['status'] == 'successful')
        // {
        //     // $txid = $_GET['transaction_id'];
        //check for the status using uuid;
            $uuid = $_SESSION['uuid'];

            sleep(20);
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
              
              $response = curl_exec($curl);
              curl_close($curl);
            //   curl_close($curl);
            //   echo "hello";
            //   var_dump($response);
            //   exit();
              session_unset('uuid');
              $res = json_decode($response);
              if($res->status == 'failed')
              {
                
              echo "failed";
              //var_dump($response);
              exit();
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                if($amountPaid >= $amountToPay)
                {
                    echo 'Payment successful';

                    //* Continue to give item to the user
                }
                else
                {
                    echo 'Fraud transactio detected';
                }
              }
              else
              {
                  echo 'Can not process payment';
              }
        //}
    //}
?>