<?php

namespace localhostj\php_interface;

use DateTimeImmutable;
use localhostj\php_interface\Notification;

abstract class AbstractNotification implements Notification
{
    protected string $status;
    protected DateTimeImmutable $timestamp;

    abstract public function send(string $message): void;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTimestamp(): DateTimeImmutable
    {
        return $this->timestamp;
    }
}