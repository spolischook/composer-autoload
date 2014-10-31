<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$response = new Response('Hello World!', 200, array('Content-Type' => 'text/plain'));
$response->send();
