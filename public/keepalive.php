<?php
header('Content-Type: text/plain');

$failure = false;
$response = array('result' => 'success');
$server = $_SERVER['SERVER_NAME'];

if (!file_put_contents('/tmp/keepalive.txt', time() . PHP_EOL)) {
    $failure = true;
    $response['result'] = 'failure';
    $response['message'] = 'cannot write to file system';
}

if (file_exists('/tmp/syncing.touch')) {
    $response['result'] = 'syncing';
}

print json_encode($response);
