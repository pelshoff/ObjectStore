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
 * ObjectType is a blueprint for an Object. It holds all the fields and Object
 * will get.
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          Pim Elshoff <pim@pelshoff.com>
 * @version         0.1
 */
class ObjectType
{
    /**
     * The list of all fields that correspond to this ObjectType
     *
     * @var array   An array of Fields
     */
    private $_fields;

    /**
     * The id value for this ObjectType
     *
     * @var int
     */
    private $_objectTypeId;

    /**
     * The name for this ObjectType
     *
     * @var string
     */
    private $_objectTypeName;

    /**
     * @param   string  $objectTypeName A string of length > 0
     * @param   array   $fields
     * @param   type    $objectTypeId   A positive int
     */
    public function __construct($objectTypeName, array $fields = array(), $objectTypeId = null)
    {
        if (!is_string($objectTypeName) || strlen($objectTypeName) < 1)
        {
            throw new Exception('$objectTypeName must be a string of positive length');
        }
        if (!is_array($fields))
        {
            throw new Exception('$fields must be an array');
        }
        if (!is_null($objectTypeId) && (!is_int($objectTypeId) || $objectTypeId < 1))
        {
            throw new Exception('$objectTypeId must be a positive int or null');
        }
        $this->_objectTypeName      = $objectTypeName;
        $this->_fields              = $fields;
        $this->_objectTypeId        = $objectTypeId;
    }

    /**
     * @return  array   An array of Fields, corresponding to this ObjectType
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * @return  int     The id value for this ObjectType
     */
    public function getObjectTypeId()
    {
        return $this->_objectTypeId;
    }

    /**
     * @return  string  The name for this ObjectType
     */
    public function getObjectTypeName()
    {
        return $this->_objectTypeName;
    }
}
