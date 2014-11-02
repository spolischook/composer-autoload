<?php

namespace Spolischook\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        return new Response($this->twig->render('index.html.twig'));
    }
}
