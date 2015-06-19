Slack Notification
==================

Slack通知を行うArtisanコマンド。

## Requirement

- Laravel 5.0.x|5.1.x


## Installation

`composer.json`に外部リポジトリを設定する。

```json:composer.json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/unzip-inc/slack-notification.git"
    }
  ]
}
```

パッケージの使用を設定する。

```sh
composer require unzip/slack-notification:"1.0.*"
```

`config/app.php`の`providers`配列にサービスプロバイダーを追加する。

```php:config/app.php
\Unzip\Slack\SlackNotificationServiceProvider::class,
```

設定ファイルを生成して、設定値を変更できる。

```sh
php artisan vendor:publish
```

## Usage

```bash
php artisan slack メッセージ [--level=good|warning|danger]
```
