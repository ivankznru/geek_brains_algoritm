<?php

namespace Homework5\Decorator;

abstract class NotifierDecorator implements Notifier
{
    private ?Notifier $notifier;

    /**
     * @param Notifier|null $notifier
     */
    public function __construct(Notifier $notifier = null)
    {
        $this->notifier = $notifier;
    }

    /**
     * @inheritDoc
     */
    public function notify(string $notification, array $recipients = []): void
    {
        if ($this->notifier) {
            $this->notifier->notify($notification, $recipients);
        }
    }
}
