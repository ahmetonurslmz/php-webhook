<?php

namespace PhpWebhook\Exceptions;

use Exception;

final class CouldNotSend extends Exception {
    public static function authorizationError() {
        return new static("Discord Channel token is invalid. Please make sure token provided is valid.");
    }
}