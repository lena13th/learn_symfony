<?php


namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleLikeController extends AbstractController
{
    /**
     * @param $id
     * @param $type
     * @Route("articles/{id<\d+>}/like/{type<like|dislike>}", methods={"POST"}, name="app_article_like")
     */
    public function like($id, $type, LoggerInterface $logger)
    {
        if ($type == 'like') {
            $likes = rand(121, 200);
            $logger->info('лайк');
        } else {
            $likes = rand(0, 119);
            $logger->info('дизлайк');
        }

        return $this->json(['likes' => $likes]);
    }
}