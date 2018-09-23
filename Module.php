<?php

namespace darealfive\base;

use yii\base\Component;
use darealfive\base\behaviors\message\MessageSender;

/**
 * Class Module
 *
 * @package darealfive\base
 */
abstract class Module extends \yii\base\Module
{
    /**
     * Convenience to send something on-the-fly via the MessageSender behavior.
     * E.g. Module::messageSenderBehavior($this)->sendMessage('My Message', 'info');
     *
     * @param Component $sender the component which wants to send something
     *
     * @return MessageSender
     */
    public static function messageSenderBehavior(Component $sender): MessageSender
    {
        $behavior = new MessageSender();

        return $sender->attachBehavior(MessageSender::class, $behavior);
    }
}