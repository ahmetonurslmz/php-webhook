<?php


namespace PhpWebhook\Providers;

use PhpWebhook\Handler;

class Discord extends Handler {
    protected $URL = 'https://discordapp.com/api/webhooks/';

    protected function prepareData() {
        return ['content' => $this->message];
    }
}