<?php

namespace PhpWebhook;

use stdClass;

class Handler {
    protected $URL = '';
    protected $message = 'AOS - hello world';
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
        return new stdClass();
    }

    protected function prepareURL() {
        return $this->URL.$this->token;
    }

    protected function sendRequest() {
        $context = $this->prepareRequest();
        $url = $this->prepareURL();

        $fp = fopen($url, 'r', false, $context);
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