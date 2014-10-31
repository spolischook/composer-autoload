<?php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Spolischook\Controller\ArticleController;
use Spolischook\Controller\IndexController;
use Phroute\RouteCollector;

$request = Request::createFromGlobals();

$articleController = new ArticleController();
$indexController = new IndexController();

$router = new RouteCollector();

$router->get('/', [$indexController,'indexAction']);

$router->get('/articles/{id}', [$articleController,'getArticleAction']);
$router->put('/articles/{id}', [$articleController,'getArticleAction']);
$router->post('/articles/{id}', [$articleController,'getArticleAction']);
$router->delete('/articles/{id}', [$articleController,'getArticleAction']);
$router->get('/articles', [$articleController,'getArticlesAction']);

$dispatcher = new Phroute\Dispatcher($router);
$response = $dispatcher->dispatch($request->getMethod(), parse_url($request->getPathInfo(), PHP_URL_PATH));

$response->send();
