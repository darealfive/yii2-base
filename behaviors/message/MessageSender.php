<?php
/**
 * MessageSender class file
 */

namespace darealfive\base\behaviors\message;

use yii\base\Event;

/**
 * Class MessageSender behavior to send events listed in the interface MessageEventInterface properly.
 *
 * @package darealfive\base\behaviors\message
 */
class MessageSender extends Behavior implements MessageEventInterface
{
    /**
     * Sends a message into the event system.
     * Represent the happening of the event EVENT_MESSAGE_SENT of MessageEventInterface.
     *
     * @param string $message  the message being send
     * @param string $category the category which indicates which kind of message this is. The event handler has to
     *                         decide how this is to be interpreted.
     *
     * @see MessageEventInterface
     */
    public function sendMessage($message, $category = MessageEventInterface::MESSAGE_CATEGORY_INFO)
    {
        if (Event::hasHandlers($this, MessageEventInterface::EVENT_MESSAGE_SENT)) {

            Event::trigger($this, MessageEventInterface::EVENT_MESSAGE_SENT, new MessageEvent([
                'message'  => $message,
                'category' => $category
            ]));
        }
    }
}