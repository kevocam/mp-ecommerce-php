<?php
require_once 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439');

MercadoPago\SDK::setIntegratorId("dev_2e4ad5dd362f11eb809d0242ac130004");
$filename = 'response.json';


$data = file_get_contents('php://input') . PHP_EOL;
file_put_contents($filename, print_r($data, true), FILE_APPEND);

?>