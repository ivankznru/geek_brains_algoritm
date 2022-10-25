<?php


namespace hw4\PostgreSql;
use hw4\AConnection;

class Connection extends AConnection
{
    /**
     * @inheritDoc
     */
    public function connect(string $user, string $password): bool
    {
        $this->status = true;
        echo 'PostgreSql connected' . PHP_EOL;
        return true;
    }

    /**
     * @inheritDoc
     */
    public function disconnect(): bool
    {
        $this->status = false;
        echo 'PostgreSql disconnected' . PHP_EOL;
        return true;
    }
}
