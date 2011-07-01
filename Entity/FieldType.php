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
 * FieldType holds all the types of the ObjectStore. Objects will have fields
 * that have a FieldType. The FieldType will be used in deciding where to store
 * ObjectValues and whether an ObjectValue is even valid.
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          Pim Elshoff <pim@pelshoff.com>
 * @version         0.1
 */
class FieldType
{
    const BASETYPE_BOOL                 = "Bool";
    const BASETYPE_DATE                 = "Date";
    const BASETYPE_FLOAT                = "Float";
    const BASETYPE_INT                  = "Int";
    const BASETYPE_STRING               = "String";
    const BASETYPE_TEXT                 = "Text";

    /**
     * The base type this type is derived from
     *
     * @var string
     */
    private $_fieldTypeBase;

    /**
     * The id of this type
     *
     * @var int
     */
    private $_fieldTypeId;

    /**
     * The name of this type
     *
     * @var string
     */
    private $_fieldTypeName;

    /**
     * @param   string  $fieldTypeName  A string of length > 0
     * @param   string  $fieldTypeBase  One of the BASETYPE constants
     * @param   int     $fieldTypeId    A positive int
     */
    public function __construct($fieldTypeName, $fieldTypeBase, $fieldTypeId = null)
    {
        if (!is_string($fieldTypeName) || strlen($$fieldTypeName) < 1)
        {
            throw new Exception('$fieldTypeName must be a string of positive length');
        }
        if (!is_string($fieldTypeBase) || strlen($fieldTypeBase) < 1 || !$this->isValidBaseType($fieldTypeBase))
        {
            throw new Exception('$fieldTypeBase must be a string of positive length');
        }
        if (!is_null($fieldTypeId) && (!is_int($fieldTypeId) || $fieldTypeId < 1))
        {
            throw new Exception('$fieldTypeId must be a positive int or null');
        }
        $this->_fieldTypeName       = $fieldTypeName;
        $this->_fieldTypeBase       = $fieldTypeBase;
        $this->_fieldTypeId         = $fieldTypeId;
    }

    /**
     * @param    mixed    $value
     *
     * @return    bool    True if the value is valid for this fieldtype
     *
     * @todo implement
     */
    public function isValid($value)
    {
        return true;
    }

    /**
     * @param    string    $fieldTypeBase
     *
     * @return    bool    True if the $fieldTypeBase is a valid base type
     */
    private function isValidBaseType($fieldTypeBase)
    {
        return $fieldTypeBase == self::BASETYPE_BOOL
            || $fieldTypeBase == self::BASETYPE_DATE
            || $fieldTypeBase == self::BASETYPE_FLOAT
            || $fieldTypeBase == self::BASETYPE_INT
            || $fieldTypeBase == self::BASETYPE_STRING
            || $fieldTypeBase == self::BASETYPE_TEXT
            ;
    }
}
