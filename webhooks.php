

<?php
http_response_code(200);

require('vendor/autoload.php');

MercadoPago\SDK::setAccessToken('APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439');

MercadoPago\SDK::setIntegratorId("dev_2e4ad5dd362f11eb809d0242ac130004");



$rawdata = file_get_contents("php://input");

file_put_contents("webhook.json","/---------------------------------------------------\\\n",FILE_APPEND);
file_put_contents("webhook.json","Llamada:\n",FILE_APPEND);
file_put_contents("webhook.json","GET:\n",FILE_APPEND);
file_put_contents("webhook.json",json_encode($_GET) . "\n",FILE_APPEND);
file_put_contents("webhook.json","POST:\n",FILE_APPEND);
file_put_contents("webhook.json",json_encode($rawdata) . "\n",FILE_APPEND);
file_put_contents("webhook.json","---- Resultado ----\n",FILE_APPEND);

if(isset($_GET['topic'])){
    switch($_GET['topic']){
        case 'payment':
            $result = MercadoPago\Payment::find_by_id($_GET['id']);
            break;
        case 'merchant_order':
            $result = MercadoPago\MerchantOrder::find_by_id($_GET['id']);
            break;
        default:
            $result = "Topic no reconocido.";
        break;
    }
} else {
    $result = "Topic no recibido.";
}

file_put_contents("webhook.json",json_encode($result) . "\n",FILE_APPEND);
file_put_contents("webhook.json","\---------------------------------------------------/\n",FILE_APPEND);

?>