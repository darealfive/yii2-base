<?php
/**
 * MessageEventInterface class file
 */

namespace darealfive\base\behaviors\message;

use yii\base\Event;

/**
 * Class MessageEvent
 *
 * @package darealfive\base\behaviors\message
 */
class MessageEvent extends Event
{
    /**
     * @var string the message being send.
     */
    public $message;

    /**
     * @var string the message category
     */
    public $category;
}