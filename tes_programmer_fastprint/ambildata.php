<?php 

$str = "bisacoding-19-07-23";
$pass = md5($str);

$post=[

	'username' => 'tesprogrammer190723C21',
	'password' => $pass	

];


$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://recruitment.fastprint.co.id/tes/api_tes_programmer');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl,CURLOPT_POST, 1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$post);

$response = curl_exec($curl);


curl_close($curl);
$result = json_decode($response,true);




?>