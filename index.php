<?php

	

	require __DIR__ . '/vendor/autoload.php';

	
	#### Начало функций API ####

   /** 	function _parse 
   	* 	print preformated array
    * 	@var $array array 
    */  

    if (!function_exists('_parse')) {

         /**
          * @param $array
          */

        function _parse ($array, $dataInfo = 'Any', $json = false, $export = false) { 

            if (!empty($array)) {
                
                if ($json) { 
                		//$array = json_encode($array);
                		$array = json_decode($array);
               	}
                

                print_r($dataInfo . '<hr><pre>'); print_r($array); print_r('</pre>'); 

                if ($export) { 
                        print_r('<pre>'); var_export($array); print_r('</pre>');                         
                }
            }

        }
    }

	#### Cient API Union ####    


	$credentials = 	[	'username' => "semakhin2018@yandex.ru", 
						'password' => "qwerty12345", 
					];

	use GuzzleHttp\Client;

	$client = new Client([
	   /* 'base_url' => ['​https://unicom24.ru/api/partners/requests/v1/region/'],
	    'defaults' => [
	        'headers' => ['' => ''],
	        'query'   => ['' => ''],
	        'auth'    => [	$credentials['username'], $credentials['password']	],
	        'proxy'   => ''
	    ]*/
	]);
	

	$client = $client->request('GET', 'https://unicom24.ru/api/partners/requests/v1/region/', 
		[
    		'auth' => [$credentials['username'], $credentials['password']]
		]
	);
		
		_parse($client->getStatusCode(), 'status code');
		//_parse($client->getHeader('content-type'), 'content-type');

		_parse($client->getBody(), 'data', true);
		//echo $client->getBody();
		


