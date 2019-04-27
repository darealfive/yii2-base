<?php
/**
 * Behavior class file
 */

namespace darealfive\base\behaviors\property;

use BadMethodCallException;

/**
 * Class Behavior
 *
 * @package darealfive\base\behaviors\property
 */
abstract class Behavior extends \darealfive\base\behaviors\Behavior
{
    /**
     * @var string the property name added for the owner. Defaults to null meaning you are allowed to initialise it.
     * @access private
     */
    private $_propertyName;

    /**
     * @var mixed any kind of value which is to be associated with $_propertyName.
     * @access private
     * @see    Behavior::set() will overwrite this value
     * @see    Behavior::get() will return this value
     */
    private $_propertyValue;

    /**
     * Setter for the property name accessible for the owner.
     * You are only allowed to set it once to something != null. Another try to overwrite it will lead to an exception.
     *
     * @param string $propertyName
     *
     * @access public
     */
    public function setPropertyName($propertyName): void
    {
        if ($this->_propertyName !== null) {

            throw new BadMethodCallException('Do not redefine property more than once');
        }

        $this->_propertyName = $propertyName;
    }

    // Property access:

    /**
     * @return mixed the property value.
     * @access protected
     */
    protected function get()
    {
        return $this->_propertyValue;
    }

    /**
     * @param mixed $propertyValue the property value.
     *
     * @access protected
     */
    protected function set($propertyValue): void
    {
        $this->_propertyValue = $propertyValue;
    }

    /**
     * {@inheritdoc}
     */
    public function canGetProperty($name, $checkVars = true): bool
    {
        if ($this->propertyExists($name)) {
            return true;
        }

        return parent::canGetProperty($name, $checkVars);
    }

    /**
     * {@inheritdoc}
     */
    public function canSetProperty($name, $checkVars = true): bool
    {
        if ($this->propertyExists($name)) {
            return true;
        }

        return parent::canSetProperty($name, $checkVars);
    }

    /**
     * {@inheritdoc}
     */
    public function __get($name)
    {
        if ($this->propertyExists($name)) {
            return $this->get();
        }

        return parent::__get($name);
    }

    /**
     * {@inheritdoc}
     */
    public function __set($name, $value)
    {
        if ($this->propertyExists($name)) {
            $this->set($value);
        } else {
            parent::__set($name, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function __isset($name)
    {
        if ($this->propertyExists($name)) {
            return $this->get() !== null;
        }

        return parent::__isset($name);
    }

    /**
     * {@inheritdoc}
     */
    public function __unset($name)
    {
        if ($this->propertyExists($name)) {
            $this->set(null);
        } else {
            parent::__unset($name);
        }
    }

    /**
     * Checks if given property name is configured in this behavior.
     *
     * @param string $propertyName the property name to check
     *
     * @access private
     * @return bool
     */
    private function propertyExists($propertyName): bool
    {
        return $this->_propertyName === $propertyName;
    }
}