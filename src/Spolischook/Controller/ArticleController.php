<?php

namespace Spolischook\Controller;

use Spolischook\Model\Article;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @return Response
     */
    public function getArticlesAction()
    {
        return new Response($this->twig->render('articles.html.twig', [
            'articles' => iterator_to_array(Article::findAll())]));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function getArticleAction($id)
    {
        return new Response($this->twig->render('article.html.twig', ['article' => Article::findOne($id)]));
    }

    /**
     * @param string $id
     * @return Response
     */
    public function putArticleAction($id)
    {
        return new Response();
    }

    /**
     * @return Response
     */
    public function postArticleAction()
    {
        $articleData = json_decode($this->request->getContent(), true);

        $article = Article::getFromArray($articleData);
        $article->save();

        return new Response($this->twig->render('article.html.twig', ['method' => 'Post', 'articleId' => $article->getId()]), 201);
    }

    /**
     * @param string $id
     * @return Response
     */
    public function deleteArticleAction($id)
    {
        Article::delete($id);
        return new Response();
    }
}
