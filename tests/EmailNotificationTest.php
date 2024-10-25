<?php

use PHPUnit\Framework\TestCase;
use localhostj\php_interface\EmailNotification;
use localhostj\php_interface\Exceptions\ThemeIsNotSelectedException;

class EmailNotificationTest extends TestCase
{
    public function testSendMessage(){
        $email = new EmailNotification();
        $email->setTheme('test');
        $email->send('Test message');
        $this->assertEquals('sent', $email->getStatus());
    }
    public function testThemeIsNotSelectedExceptions(){
        $this->expectException(ThemeIsNotSelectedException::class);
        $email = new EmailNotification();
        $email->send('Hello world!');
    }
}