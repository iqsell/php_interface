<?php

namespace localhostj\php_interface;

use localhostj\php_interface\AbstractNotification;
use localhostj\php_interface\Exceptions\MessageExceedsMaxCharactersException;

class SMSNotification extends AbstractNotification
{
    private int $maxLength = 160;

    public function send(string $message): void
    {
        try {
            if (strlen($message) > $this->maxLength) {
                throw new MessageExceedsMaxCharactersException('Длина сообщения > 160 символов');
            }
            $this->status = "sent";
            print "Отправка по SMS: " . $message . PHP_EOL;
        } catch (MessageExceedsMaxCharactersException $e) {
            $this->status = "failed";
            print $e->getMessage() . PHP_EOL;
        }
    }
    public function getType(): string
    {
        return "SMS";
    }
}