<?php

namespace PhpWebhook;

use PhpWebhook\Exceptions\CouldNotSend;

class Handler {
    protected $URL = '';
    protected $message = 'hello world';
    private $data;
    protected $token = '';

    protected function prepareRequest() {
        $data = null;
        if ($this->data) {
            $data = $this->data;
        } else {
            $data = $this->prepareData();
        }

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );
        return stream_context_create($options);
    }

    protected function prepareData() {
        return [];
    }

    protected function prepareURL() {
        return $this->URL.$this->token;
    }

    protected function sendRequest() {
        $context = $this->prepareRequest();
        $url = $this->prepareURL();

        if (!$this->token) {
            throw CouldNotSend::authorizationError();
        }

        $fp = @fopen($url, 'r', false, $context);

        if (!$fp) {
            throw CouldNotSend::authorizationError();
        }

        fpassthru($fp);
        fclose($fp);
        return $fp;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function request() {
        $this->sendRequest();
    }
}