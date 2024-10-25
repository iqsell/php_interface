<?php

use PHPUnit\Framework\TestCase;
use localhostj\php_interface\SMSNotification;
use localhostj\php_interface\AbstractNotification;
use localhostj\php_interface\Exceptions\MessageExceedsMaxCharactersException;

class SMSNotificationTest extends TestCase
{
    public function testSendMessage()
    {
        $message = "Hello world!";
        $sms = new SMSNotification();
        $sms->send($message);
        $this->assertEquals('sent', $sms->getStatus());
    }
    public function testMessageExceedsMaxCharactersException()
    {
        $this->expectException(MessageExceedsMaxCharactersException::class);
        $message = "Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world! Hello world!";
        $sms = new SMSNotification();
        $sms->send($message);
    }
}