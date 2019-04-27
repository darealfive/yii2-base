<?php
/**
 * Action class file
 */

namespace darealfive\base\controllers\actions;

use darealfive\base\controllers\Controller;
use yii\base\ActionEvent;

/**
 * Class Action defines additional events.
 *
 * @package darealfive\base\controllers\actions
 *
 * @property Controller $controller
 *
 * @method run() runs the action
 */
abstract class Action extends \yii\base\Action
{
    public const EVENT_BEFORE_RUN = 'beforeRun';

    public function beforeRun(): bool
    {
        if (parent::beforeRun()) {

            $event = new ActionEvent($this);
            $this->trigger(static::EVENT_BEFORE_RUN, $event);

            return $event->isValid;
        }

        return false;
    }
}