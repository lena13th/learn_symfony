<?php


namespace App\Service;


use App\Helpers\LoggerTrait;
use Nexy\Slack\Client;

class SlackClient
{
    use LoggerTrait;

    /**
     * @var Client
     */
    private $slack;

    /**
     * SlackClient constructor.
     */
    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }

//    /**
//     * @param MarkdownParser $parser
//     * @required
//     */
//    public function example(MarkdownParser $parser) {
//        dump($parser->parse('#Hello'));
//    }

    public function send(string $message, string $icon = ':ghost:', string $from='Cat-cas-car')
    {
        $this->logInfo('Отправка сообщения в slack', ['message' => $message]);

        $slackMessage = $this->slack->createMessage();

        $slackMessage
            ->from($from)
            ->withIcon($icon)
            ->setText($message)
        ;

        $this->slack->sendMessage($slackMessage);
    }
}