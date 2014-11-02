<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Spolischook\SpolischookKernel;

$request = Request::createFromGlobals();

$kernel = new SpolischookKernel();
$response = $kernel->handle($request);

$response->send();
