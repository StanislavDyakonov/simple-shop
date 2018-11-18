<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Cache-control, Last-Modified, Etag, Pragma, Expires, Authorization");

$json = file_get_contents('shop.json');

$arr = json_decode($json);

print json_encode($arr);
