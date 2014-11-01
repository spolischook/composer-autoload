<?php

namespace Spolischook\Controller;

use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /** @var  \Twig_Environment */
    protected $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     */
    public function getArticlesAction()
    {
        return new Response('So many articles here');
    }

    /**
     * @param string $id
     * @return Response
     */
    public function getArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Get', 'articleId' => $id]));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function putArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Put', 'articleId' => $id]));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function postArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Post', 'articleId' => $id]));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function deleteArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['method' => 'Delete', 'articleId' => $id]));
    }
}
