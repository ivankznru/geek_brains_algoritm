<?php

namespace Homework5\Decorator\Notifier;

use Homework5\Decorator\NotifierDecorator;

class Email extends NotifierDecorator
{
    /**
     * @param string $notification
     * @param array $recipients
     */
    public function notify(string $notification, array $recipients = []): void
    {
        parent::notify($notification, $recipients);

        foreach ($recipients[static::class] as $recipient) {
            echo 'Send Email notification: ' . $notification . ' to ' . $recipient . PHP_EOL;
        }
    }
}
