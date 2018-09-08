<?php
/**
 * PropertyException class file
 */

namespace darealfive\base\behaviors\property;

use darealfive\base\Exception;

/**
 * Class PropertyException
 *
 * @package darealfive\base\behaviors\property
 */
class PropertyException extends Exception
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Property Exception';
    }
}