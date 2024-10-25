<?php

namespace localhostj\php_interface;

use Exception;
use localhostj\php_interface\AbstractNotification;
use localhostj\php_interface\Exceptions\ThemeIsNotSelectedException;

class EmailNotification extends AbstractNotification
{
    private string $theme;

    public function setTheme(string $theme): void
    {
        $this->theme = $theme;
    }

    public function send(string $message): void
    {
        if (empty($this->theme)) {
            throw new ThemeIsNotSelectedException('Выберите тему');
        }

        try {
            print "Email send: " . $this->theme . " - " . $message . PHP_EOL;
            $this->status = "sent";
        } catch (Exception $e) {
            $this->status = "failed";
            print $e->getMessage() . PHP_EOL;
        }
    }

    public function getType(): string
    {
        return "Email";
    }
}