<?php


namespace AOS\PhpWebhook\Providers;

use AOS\PhpWebhook\Handler;
use stdClass;

class Discord extends Handler {
    protected $URL = 'https://discordapp.com/api/webhooks/';

    protected function prepareData() {
        $data = new stdClass();
        $data->content = $this->message;
        return $data;
    }
}