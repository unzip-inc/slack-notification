<?php
namespace Unzip\Slack\Console;

use Illuminate\Console\Command;
use Maknz\Slack\Client as Slack;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * SlackNotificationCommand
 *
 * @package Unzip\Slack\Console
 */
class SlackNotificationCommand extends Command
{
    protected $name = 'slack';

    protected $description = 'Send notification via Slack';

    /** @var \Maknz\Slack\Client */
    private $slack;

    /**
     * constructor
     * @param Slack $slack
     */
    public function __construct(Slack $slack)
    {
        $this->slack = $slack;
        parent::__construct();
    }

    public function fire()
    {
        $message = $this->argument('message');
        $level = $this->option('level');

        $this->slack->setLinkNames(true);
        $slackMessage = $this->slack->createMessage();
        $slackMessage->enableMarkdown();

        if ($level !== null && in_array($level, ['good', 'warning', 'danger'], true)) {
            // メッセージレベル付き送信
            $attachment = [
                'text' => $message,
                'fallback' => $message,
                'color' => $level,
            ];

            $slackMessage->attach($attachment)->send();
        } else {
            // テキストメッセージのみ送信
            $slackMessage->send($message);
        }
    }

    /**
     * コマンド引数定義
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['message', InputArgument::REQUIRED, 'message text.'],
        ];
    }

    /**
     * コマンドオプション設定定義
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['level', null, InputOption::VALUE_OPTIONAL, 'message level.'],
        ];
    }
}
