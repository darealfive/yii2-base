<?php

namespace darealfive\base;

use yii\base\Event;

/**
 * Class Migration
 *
 * @package darealfive\media
 */
class Migration extends \yii\db\Migration
{
    public const EVENT_INIT = 'init';

    public $tableOptions;

    public function init()
    {
        parent::init();

        $this->trigger(self::EVENT_INIT, new Event(['sender' => $this]));
    }

    /**
     * Add a foreign key and build the name based on tables and columns automatically.
     *
     * @param string       $table      the table that the foreign key constraint will be added to.
     * @param string|array $columns    the name of the column to that the constraint will be added on. If there are multiple columns, separate them with commas or use an array.
     * @param string       $refTable   the table that the foreign key references to.
     * @param string|array $refColumns the name of the column that the foreign key references to. If there are multiple columns, separate them with commas or use an array.
     * @param string       $delete     the ON DELETE option. Most DBMS support these options: RESTRICT, CASCADE, NO ACTION, SET DEFAULT, SET NULL
     * @param string       $update     the ON UPDATE option. Most DBMS support these options: RESTRICT, CASCADE, NO ACTION, SET DEFAULT, SET NULL
     *
     * @see buildForeignKeyName for full documentation
     */
    public function addForeignKeyAutoName($table, $columns, $refTable, $refColumns, $delete = null,
                                          $update = null): void
    {
        $this->addForeignKey(
            self::buildForeignKeyName($table, $columns, $refTable, $refColumns),
            $table,
            $columns,
            $refTable,
            $refColumns,
            $delete,
            $update
        );
    }

    /**
     * Builds foreign key name in the following schema:
     * FK__<table>-<column>-<nextColumn>__<refTable>-<refColumn>-<nextRefColumn>
     *
     * @param $table
     * @param $columns
     * @param $refTable
     * @param $refColumns
     *
     * @return string
     */
    public static function buildForeignKeyName($table, $columns, $refTable, $refColumns): string
    {
        $columns    = [$columns];
        $refColumns = [$refColumns];

        return sprintf('FK__%s-%s__%s-%s', $table, implode('-', $columns), $refTable, implode('-', $refColumns));
    }

    /**
     * Add a foreign key and build the name based on tables and columns automatically.
     *
     *
     * @param string       $table   the table that the foreign key constraint will be added to.
     * @param string|array $columns the name of the column to that the constraint will be added on. If there are multiple columns, separate them with commas or use an array.
     * @param bool         $unique  the table that the foreign key references to.
     *
     * @see buildForeignKeyName for full documentation
     */
    public function createIndexAutoName($table, $columns, $unique = false): void
    {
        $this->createIndex(
            self::buildIndexName($table, $columns),
            $table,
            $columns,
            $unique
        );
    }

    /**
     * Builds index name in the following schema:
     * IX__<table>-<column>-<nextColumn>
     *
     * @param $table
     * @param $columns
     *
     * @return string
     */
    public static function buildIndexName($table, $columns): string
    {
        $columns = (array) $columns;

        return sprintf('IX__%s-%s', $table, implode('-', $columns));
    }
}