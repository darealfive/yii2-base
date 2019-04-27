<?php

namespace darealfive\base\components;

/**
 * Class ActiveRecord
 *
 * @package darealfive\base\components
 */
abstract class ActiveRecord extends \yii\db\ActiveRecord
{
    public const SCENARIO_CREATE = 'create';
    public const SCENARIO_UPDATE = 'update';
    public const SCENARIO_DELETE = 'delete';
}