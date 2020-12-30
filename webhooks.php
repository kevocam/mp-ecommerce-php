<?php
// Loading Composer
require __DIR__ . '/vendor/autoload.php';
DK::setAccessToken('APP_USR-8208253118659647-112521-dd670f3fd6aa9147df51117701a2082e-677408439');

MercadoPago\SDK::

$file = 'logs.txt';

$json_event = file_get_contents( 'php://input', true );
$event = json_decode( $json_event );

if ( isset( $event->type, $event->data->id ) ) {
    $event_type = $event->type;
    $event_id = $event->data->id;

    $payment = MercadoPago\Payment::find_by_id( $event_id );

    $current = file_get_contents( $file );
    $current .= $event_type . " recibido - ID #" . $payment->id . "\n";

} else {
    $current = file_get_contents( $file );
    $current .= "Llamada directa\n";
}

file_put_contents( $file, $current );

http_response_code( 200 );


