
<?php

$verification_data = array(
					'merchant' =>'T278735', 

					'payment' => array('instruction'=>''),

					'transaction' =>array(
						'deviceIdentifier'=>'S',
						'type'=>'002',
						'currency'=>'INR',
						'identifier'=>9000000002679,
						'dateTime' =>'03-06-2021',
						'subType' =>'002',
						'requestType'=> 'TSI'
					),

					'consumer' => 'c90001008');
					$requestdata = json_encode($verification_data);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://www.paynimo.com/api/paynimoV2.req',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS =>$requestdata,
				 ));
				$response = curl_exec($curl);
				curl_close($curl);
				var_dump($response);