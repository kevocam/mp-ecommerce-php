<?php
$json_event = file_get_contents('php://input', true);

file_put_contents('php://stderr', $json_event);
file_put_contents(__DIR__.'/log/webhook.log', $json_event);

$data = json_encode($_POST);
file_put_contents('php://stderr', $data);
file_put_contents(__DIR__.'/log/log.log', $data);