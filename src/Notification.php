<?php

namespace localhostj\php_interface;

use DateTimeImmutable;

interface Notification
{
    public function send(string $message): void;
    public function getStatus(): string;
    public function getType(): string;
    public function getTimestamp(): DateTimeImmutable;
}