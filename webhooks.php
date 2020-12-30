
<?php
MercadoPago\SDK::setAccessToken('APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439');

MercadoPago\SDK::setIntegratorId("dev_2e4ad5dd362f11eb809d0242ac130004");

require __DIR__ .  '/vendor/autoload.php';


var_dump($_POST, $_GET);
$content = json_encode($_POST);
file_put_contents('log', $content);