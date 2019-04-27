<?php

namespace darealfive\base\behaviors\action;

use darealfive\base\controllers\actions\Action;
use yii\base\InvalidArgumentException;

/**
 * Class Behavior as a superclass for all @see Action related behaviors
 *
 * @package darealfive\base\behaviors\action
 *
 * @property Action $owner
 */
abstract class Behavior extends \darealfive\base\behaviors\Behavior
{
    /**
     * Ensures that owner is of supported class
     *
     * @inheritdoc
     */
    public function attach($owner): void
    {
        if (!$owner instanceof Action) {

            throw new InvalidArgumentException(sprintf('Owner must be of class %s, %s given', Action::class,
                get_class($owner)));
        }

        parent::attach($owner);
    }
}