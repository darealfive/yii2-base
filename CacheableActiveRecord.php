<?php

namespace darealfive\base;

use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * Class CacheableActiveRecord
 *
 * @package darealfive\base
 * @property string $created_at
 * @property string $updated_at
 *
 * @package darealfive\base
 */
abstract class CacheableActiveRecord extends ActiveRecord
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                [
                    'class' => TimestampBehavior::class,
                    'value' => new Expression('NOW()'),
                ]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}