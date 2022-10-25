<?php


namespace hw4\MySql;

use hw4\AConnection;
use hw4\DataBaseFactory as IDataBaseFactory;
use hw4\QueryBuilder as AQueryBuilder;
use hw4\Record as ARecord;

class DataBaseFactory implements IDataBaseFactory
{
    /**
     * @inheritDoc
     */
    public function getConnection(): AConnection
    {
        return new Connection();
    }

    /**
     * @inheritDoc
     */
    public function getRecord(AConnection $connection, string $table, int $id): ARecord
    {
        return new Record($table, $id);
    }

    /**
     * @inheritDoc
     */
    public function getQueryBuilder(AConnection $connection, string $table): AQueryBuilder
    {
        return new QueryBuilder($connection, $table);
    }
}
