<?php

namespace Spolischook\Controller;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    /** @var  Request */
    protected $request;

    /** @var  \Twig_Environment */
    protected $twig;

    public function __construct(Request $request, \Twig_Environment $twig)
    {
        $this->request = $request;
        $this->twig    = $twig;
    }
}
