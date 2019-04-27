<?php
/**
 * DirectoryBehavior class file
 */

namespace darealfive\base\behaviors\property;

use Closure;
use yii\base\Exception;
use yii\helpers\FileHelper;

/**
 * Class DirectoryBehavior
 * Ensures that the configured property is a directory.
 *
 * @package darealfive\base\behaviors\property
 */
class DirectoryBehavior extends Behavior
{
    /**
     * @var int the permission to be set for newly created directories. Defaults to 0755.
     * @access public
     */
    public $dirMode = 0755;

    /**
     * Ensures that whenever $owner is setting the property the corresponding directory exists.
     *
     * @param mixed|Closure $propertyValue path to the directory.
     *
     * @throws PropertyException
     * @throws Exception
     * @access protected
     */
    public function set($propertyValue):void
    {
        parent::set($propertyValue);
        if (!is_dir($directory = $this->get())) {

            if (!FileHelper::createDirectory($directory, $this->dirMode, true)) {

                throw new PropertyException(sprintf('Can not create directory %s', $directory));
            }
        }
    }

    /**
     * Gets the path to the directory. If corresponding property is a closure it gets evaluated.
     *
     * @return mixed
     * @access protected
     */
    protected function get()
    {
        $value = parent::get();

        if (is_callable($value)) {

            $value = call_user_func($value, $this->owner);
        }

        return $value;
    }
}