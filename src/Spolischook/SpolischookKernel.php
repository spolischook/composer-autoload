<?php

namespace Spolischook;

class SpolischookKernel extends Kernel
{
    public function getRoutes()
    {
        return array(
            ['GET', '/', 'Spolischook\Controller\IndexController:indexAction'],

            ['GET', '/articles/{id}', 'Spolischook\Controller\ArticleController:getArticleAction'],
            ['PUT', '/articles/{id}', 'Spolischook\Controller\ArticleController:putArticleAction'],
            ['POST', '/articles/{id}', 'Spolischook\Controller\ArticleController:postArticleAction'],
            ['DELETE', '/articles/{id}', 'Spolischook\Controller\ArticleController:deleteArticleAction'],

            ['GET', '/articles', 'Spolischook\Controller\ArticleController:getArticlesAction'],
            ['POST', '/articles', 'Spolischook\Controller\ArticleController:postArticleAction'],
        );
    }

    public function getTemplateHandler()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../app/views');
        $twig = new \Twig_Environment($loader);

        return $twig;
    }
}
