<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twig)
    {
        return $this->render('articles/homepage.html.twig');
    }

    /**
     * @Route("/articles/{slug}", name="app_article_show")
     */
    public function show($slug)
    {
        $comments = [
          'первый коммент',
          'второй коммент',
          'третий коммент'
        ];

        dump($slug, $this);


        return $this->render('articles/show.html.twig', [
            'article' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,

        ]);
    }
}