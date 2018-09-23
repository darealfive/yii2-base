<?php
/**
 * MessageEventInterface class file
 */

namespace darealfive\base\behaviors\message;

/**
 * Interface MessageEventInterface is meant to be used together with dedicated behavior classes listed below.
 *
 * @package darealfive\base\behaviors\message
 *
 * @see     MessageSender for the sender part
 * @see     MessageReceiver for the receiver part
 *
 * Implement this interface if your component wants to sent some messages regardless of the current environment.
 * Consider your component want to sent something but you do not want to keep care of whether there is a SESSION
 * available (required by flash messages), or how to handle this message event properly in an abstract way.
 *
 * In that cases you may want to do the following simply steps:
 * (From the Event-listener point of view)
 * 1.) Attach the special behavior MessageReceiver to your Component
 * 2.) Provide a handler with the signature function(MessageEvent $event) by calling behaviors method handleMessageSent()
 * (From the Event-sender point of view)
 * 1.) You let your component implement this interface => No implementation needed, here are only constants
 * 2.) Attach the special behavior MessageSender to your Component
 * 3.) Call the method sendMessage and voilà, your message takes a round trough the event system
 */
interface MessageEventInterface
{
    /**
     * The main event name
     */
    const EVENT_MESSAGE_SENT = 'messageSent';

    /**
     * Some convenience constants to categorize the message
     *
     * @see MessageSender::sendMessage()
     */
    const MESSAGE_CATEGORY_SUCCESS = 'success';
    const MESSAGE_CATEGORY_INFO = 'info';
    const MESSAGE_CATEGORY_WARNING = 'warning';
    const MESSAGE_CATEGORY_DANGER = 'danger';
}