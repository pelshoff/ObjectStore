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
 * Object is an ObjectStore-storable, object-like, predefined, typed map. It's
 * workings are analogous to an ActiveRecord, but the definition of the Object
 * is dynamic in it's object type.
 *
 * Use the ObjectStore to store and retrieve objects.
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          Pim Elshoff <pim@pelshoff.com>
 * @version         0.1
 */
class Object
{
    /**
     * @var ObjectType
     */
    private $_objectType;

    /**
     *
     * @var int
     */
    private $_objectId;

    /**
     *
     * @var array   An array of field names => Value objects
     */
    private $_values;

    /**
     * @param  ObjectType   $objectType
     * @param  array        $values
     * @param  int          $objectId   A positive int
     */
    public function __construct(ObjectType $objectType, array $values = null, $objectId = null)
    {
        if (!is_null($objectId) && (!is_int($objectId) || $objectId < 1))
        {
            throw new Exception('$objectId must be a positive int or null');
        }
        if (!$this->isValidValues($values))
        {
            throw new Exception('$values must be an array of Value');
        }
        $this->_objectType          = $objectType;
        $this->_values              = $values;
        $this->_objectId            = $objectId;
    }

    /**
     * Provide object notation acces to values
     *
     * @throws  Exception\IllegalField  If the fieldName is invalid for this
     *                                  ObjectType, an Exception is thrown
     */
    public function __get($fieldName)
    {
        foreach ($this->_values as $value)
        {
            if ($value->getField()->getFieldName() == $fieldName)
            {
                return $value->getValue();
            }
        }
        throw new Exception\IllegalField($fieldName, $this->_objectType->getObjectTypeName());
    }

    /**
     * Provide object notation acces to values
     *
     * @throws  Exception\IllegalField  If the fieldName is invalid for this
     *                                  ObjectType, an Exception is thrown
     * @throws  Exception\IllegalValue  If the value is invalid for this
     *                                  FieldType, an Exception is thrown
     */
    public function __set($fieldName, $value)
    {
        foreach ($this->_values as $value)
        {
            if ($value->getField()->getFieldName() == $fieldName)
            {
                return $value->setValue($value);
            }
        }
        throw new Exception\IllegalField($fieldName, $this->_objectType->getObjectTypeName());
    }

    /**
     * @return  array       Return the list of values for this object
     */
    public function getValues()
    {
        return $this->_values;
    }

    /**
     * @param   ObjectType  $objectType
     *
     * @return  bool        True if this object is of type $objectType
     */
    public function typeOf(ObjectType $objectType)
    {
        return $objectType->getObjectTypeId() == $this->_objectType->getObjectTypeId();
    }
}
