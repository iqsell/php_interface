<?php

use PHPUnit\Framework\TestCase;
use localhostj\php_interface\EmailNotification;
use localhostj\php_interface\NotificationManager;
use localhostj\php_interface\SMSNotification;
use localhostj\php_interface\Notification;

class NotificationManagerTest extends TestCase
{
    public function testSendNotificationSuccessfully()
    {
        $SMSnotification = new SMSNotification;
        $manager = new NotificationManager();
        $manager->sendNotification($SMSnotification, 'Hello world!');

        $history = $manager->getNotificationHistory();
        $this->assertCount(1, $history);
        $this->assertEquals('sent', $history[0]['status']);

        $logContent = file_get_contents('log.txt');
        $this->assertStringContainsString('Отправлено, статус:sent', $logContent);
    }
    public function testSendNotificationWithException()
    {
        $EmailNotification = new EmailNotification();

        $manager = new NotificationManager();
        $manager->sendNotification($EmailNotification, 'Test message');

        $history = $manager->getNotificationHistory();
        $this->assertCount(1, $history);
        $this->assertEquals('failed', $history[0]['status']);

        $logContent = file_get_contents('log.txt');
        $this->assertStringContainsString('Ошибка: Ошибка отправки', $logContent);
    }
}