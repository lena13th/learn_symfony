<?php


namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleLikeController extends AbstractController
{
    /**
     * @param $id
     * @param $type
     * @Route("articles/{slug}/like/{type<like|dislike>}", methods={"POST"}, name="app_article_like")
     */
    public function like(Article $article, $type, LoggerInterface $logger, EntityManagerInterface $em)
    {
        if ($type == 'like') {
            $article->like();
            $logger->info('лайк');
        } else {
            $article->dislake();
            $logger->info('дизлайк');
        }

        $em->flush();

        return $this->json(['likes' => $article->getLikeCount()]);
    }
}