<?php

namespace darealfive\base\interfaces;

use yii\data\BaseDataProvider;

/**
 * Interface Searchable
 *
 * @package darealfive\base\interfaces
 */
interface Searchable
{
    public function search(array $params = []): BaseDataProvider;
}