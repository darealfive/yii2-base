<?php
/**
 * Exception class file
 */

namespace darealfive\base;

/**
 * Class Exception
 *
 * @package darealfive\base
 */
class Exception extends \yii\base\Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Base module Exception';
    }
}