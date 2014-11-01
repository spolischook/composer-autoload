<?php

namespace Spolischook\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController
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
    public function indexAction()
    {
        return new Response('Hello World!');
    }
}
