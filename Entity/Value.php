<?php

/**
 * Pelshoff/ObjectStore
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @copyright       Copyright (c) 2011 Pim Elshoff (http://www.pelshoff.com)
 * @license         New BSD License
 * @version         0.1
 */

namespace Pelshoff\ObjectStore\Entity;

/**
 * Value represents the typed field and value of an Object
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          Pim Elshoff <pim@pelshoff.com>
 * @version         0.1
 */
class Value
{
    /**
     * Flag indicating if this value has been altered
     *
     * @var bool
     */
    private $_changed           = false;

    /**
     *
     * @var Field
     */
    private $_field;

    /**
     * The original value that was passed along by the constructor
     *
     * @var mixed
     */
    private $_originalValue;

    /**
     * The current value
     *
     * @var mixed
     */
    private $_value;

    /**
     *
     * @var int
     */
    private $_valueId;

    public function __construct(Field $field, $value = null, $valueId = null)
    {
        if (!is_null($valueId) && (!is_int($valueId) || $valueId < 1))
        {
            throw new Exception('$valueId must be a positive int or null');
        }
        if (!$field->isValid($value))
        {
            throw new Exception\IllegalValue($value, $field->getFieldName());
        }
        $this->_field               = $field;
        $this->_value               = $value;
        $this->_originalValue       = $value;
        $this->_valueId             = $valueId;
    }

    /**
     * @return    Field    The field for this value
     */
    public function getField()
    {
        return $this->_field;
    }

    /**
     * @return    mixed    The current value
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @return    bool    True if the value has changed
     */
    public function hasChanged()
    {
        return $this->_changed;
    }

    /**
     * @param    mixed    $value    The new value to set
     *
     * @return    Value    $this
     *
     * @throws    Exception\IllegalValue    If the value is invalid for this
     *                                    FieldType, an Exception is thrown
     */
    public function setValue($value)
    {
        if (!$field->isValid($value))
        {
            throw new Exception\IllegalValue($value, $field->getFieldName());
        }
        $this->_value               = $value;
        $this->_changed             = true;
    }
}
