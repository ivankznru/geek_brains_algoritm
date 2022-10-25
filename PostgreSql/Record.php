<?php


namespace hw4\PostgreSql;
use hw4\Record as ARecord;

class Record extends ARecord
{
    /**
     * @inheritDoc
     */
    public function printData(): void
    {
        echo 'PostgreSql record: ' . $this->entity . '-' . $this->number . PHP_EOL;
    }
}
