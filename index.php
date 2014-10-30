<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Spolischook\Article;

$request = Request::createFromGlobals();

$article = new Article();
$article->setTitle('Some title');

$response = new Response($article->getTitle(), 200, array('Content-Type' => 'text/plain'));
$response->send();

