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
        return new Response(sprintf('Get Article with "%s" id action', $id));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function putArticleAction($id)
    {
        return new Response(sprintf('Put Article with "%s" id  action', $id));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function postArticleAction($id)
    {
        return new Response(sprintf('Post Article with "%s" id  action', $id));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function deleteArticleAction($id)
    {
        return new Response(sprintf('Delete Article with "%s" id  action', $id));
    }
}
