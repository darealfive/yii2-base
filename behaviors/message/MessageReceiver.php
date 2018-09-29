<?php
/**
 * MessageReceiver class file
 */

namespace darealfive\base\behaviors\message;

use yii\base\Event;

/**
 * Class MessageReceiver behavior to handle the events listed in interface MessageEventInterface properly.
 *
 * @package darealfive\base\behaviors\message
 */
class MessageReceiver extends Behavior
{
    /**
     * Attaches an event handler to the special interface-level event.
     *
     * @param callable $handler the event handler.
     * @param mixed    $data    the data to be passed to the event handler when the event is triggered.
     *                          When the event handler is invoked, this data can be accessed via [[Event::data]].
     * @param bool     $append  whether to append new event handler to the end of the existing handler list. If `false`,
     *                          the new handler will be inserted at the beginning of the existing handler list.
     */
    public function handleMessageSent(callable $handler, $data = null, $append = true)
    {
        Event::on(
            MessageEventInterface::class,
            MessageEventInterface::EVENT_MESSAGE_SENT,
            $handler,
            $data,
            $append
        );
    }
}