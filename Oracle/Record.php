<?php


namespace hw4\Oracle;
use hw4\Record as ARecord;

class Record extends ARecord
{
    /**
     * @inheritDoc
     */
    public function printData(): void
    {
        echo 'Oracle record: ' . $this->entity . '-' . $this->number . PHP_EOL;
    }
}
