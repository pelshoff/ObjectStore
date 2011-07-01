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

namespace Pelshoff\ObjectStore;

/**
 * Field represents a field definition of an ObjectType
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          Pim Elshoff <pim@pelshoff.com>
 * @version         0.1
 */
class Field
{

    /**
     *
     * @var int
     */
    private $_fieldId;
    /**
     *
     * @var string
     */
    private $_fieldName;
    /**
     *
     * @var FieldType
     */
    private $_fieldType;
    /**
     *
     * @var array    An array of strings
     */
    private $_values;

    /**
     * @param   FieldType   $fieldType
     * @param   string      $fieldName    A positive length string
     * @param   array       $values
     * @param   int         $fieldId      A positive int
     */
    public function __construct(FieldType $fieldType, $fieldName, array $values, $fieldId = null)
    {
        if (!is_string($fieldName) || strlen($fieldName) < 1)
        {
            throw new Exception('$fieldName must be a string of positive length');
        }
        if (!is_array($values))
        {
            throw new Exception('$values must be an array');
        }
        if (!is_null($fieldId) && (!is_int($fieldId) || $fieldId < 1))
        {
            throw new Exception('$fieldId must be a positive int or null');
        }
        $this->_fieldType = $fieldType;
        $this->_fieldName = $fieldName;
        $this->_values = $values;
        $this->_fieldId = $fieldId;
    }

    /**
     * @return  int         The id for this field
     */
    public function getFieldId()
    {
        return $this->_fieldId;
    }

    /**
     * @return  string      The name of this field
     */
    public function getFieldName()
    {
        return $this->_fieldName;
    }

    /**
     * @return  FieldType   The type of this field
     */
    public function getFieldType()
    {
        return $this->_fieldType;
    }

    /**
     * @return  array       All the allowed values for this field
     */
    public function getValues()
    {
        return $this->_values;
    }

    /**
     * @param   mixed       $value
     *
     * @return  bool        True if the value is a valid value for this field
     */
    public function isValid($value)
    {
        return $this->_fieldType->isValid($value);
    }

}
