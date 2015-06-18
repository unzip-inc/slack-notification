<?php
namespace Unzip\Slack;

use Maknz\Slack\SlackServiceProviderLaravel5;
use Unzip\Slack\Console\SlackNotificationCommand;

/**
 * SlackNotificationServiceProvider
 *
 * @package Unzip\Slack
 */
class SlackNotificationServiceProvider extends SlackServiceProviderLaravel5
{
    public function boot()
    {
        $configPath = __DIR__ . '/../config/config.php';
        $targetPath = $this->app->make('path.config') . '/slack.php';

        $this->publishes([$configPath => $targetPath], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->commands([SlackNotificationCommand::class]);
    }
}
