# PHP Webhook

The package enables developers to send request to discord webhook in order to create message and send it discord channel.

## Installation

Use the package manager [composer](https://packagist.org/packages/ahmetonurslmz/php-webhook) to install **PHP Webhook**.

```bash
composer require ahmetonurslmz/php-webhook
```

## Usage

### Discord Webhook

```php
require __DIR__.'/vendor/autoload.php'; // You must include autoload register.

use PhpWebhook\Providers\Discord;

$discordWebhook = new Discord(); // initializes discord instance
$discordWebhook->setMessage('Hello World!');
$discordWebhook->setToken(YOUR_DISCORD_CHANNEL_TOKEN); // Discord token exists in your webhook URL.
$discordWebhook->request();
```

## Discord Integrations
### Get Token
When you copy a discord webhook URL, you obtain a link like this.
```bash
https://discord.com/api/webhooks/765243409241604116/cN5-Tv-j2Zo1fp8B_TmVkbfRTVcFmz3m_PEsAPsqJyUZXQ2j8RrXcRhLFJ68Tpv6o1nU
```
Token which exists in the webhook URL:
```bash
765243409241604116/cN5-Tv-j2Zo1fp8B_TmVkbfRTVcFmz3m_PEsAPsqJyUZXQ2j8RrXcRhLFJ68Tpv6o1nU
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
