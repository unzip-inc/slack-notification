Slack Notification
==================

Slack通知を行うArtisanコマンド。

## Requirement

- Laravel 5.0.x|5.1.x


## Installation

`config/app.php`の`providers`配列にサービスプロバイダーを追加する。

```php:config/app.php
\Unzip\Slack\SlackNotificationServiceProvider::class,
```

設定ファイルを生成して、設定値を変更できます。

```bash
php artisan vendor:publish
```

## Usage

```bash
php artisan slack メッセージ [--level=good|warning|danger]
```
