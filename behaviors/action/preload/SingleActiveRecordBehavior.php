<?php

namespace darealfive\base\behaviors\action\preload;

use darealfive\base\components\ActiveRecord;
use yii\base\InvalidArgumentException;

/**
 * Class SingleActiveRecordBehavior
 *
 * @package darealfive\base\behaviors\action\preload
 *
 * @property-read ActiveRecord $entity
 */
class SingleActiveRecordBehavior extends Behavior
{
    protected function setEntity($entity): void
    {
        if (!$entity instanceof ActiveRecord) {

            throw new InvalidArgumentException(sprintf('Entity must be instance of %s, %s given', ActiveRecord::class,
                get_class($entity)));
        }

        parent::setEntity($entity);
    }

    /**
     * @return ActiveRecord
     */
    public function getEntity(): ActiveRecord
    {
        return parent::getEntity();
    }
}