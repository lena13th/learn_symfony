<?php


namespace App\Service;


use Demontpx\ParsedownBundle\Parsedown;

class BestMarkdownParser extends Parsedown
{
    public function text($text)
    {
        return 'Лучший парсер <b> markdown </b>';
    }
}