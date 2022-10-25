<?php


namespace hw4\PostgreSql;
use hw4\QueryBuilder as AQueryBuilder;

class QueryBuilder extends AQueryBuilder
{
    /**
     * @inheritDoc
     */
    public function executeQuery(): void
    {
        echo 'PostgreSql execute query:' . PHP_EOL;
        echo 'SELECT * FROM ' . $this->table . ' ' . $this->criteries . PHP_EOL;
    }
}
