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
 * Action describes the activation or deactivation of an object value
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          Pim Elshoff <pim@pelshoff.com>
 * @version         0.1
 */
class Action
{
    /**
     * The id for this action
     *
     * @var int
     */
    private $_actionId;

    /**
     * Flag indicating if the value was activated or deactivated
     *
     * @var bool
     */
    private $_activation;

    /**
     * The value that this action describes
     *
     * @var Value
     */
    private $_value;

    public function __construct(Value $value, $activation, $actionId = null)
    {
        $this->_value           = $value;
        $this->_activation      = $activation;
        $this->_actionId        = $actionId;
    }

    /**
     * @return    bool    True if the value was activiated in this action
     */
    public function activated()
    {
        // activation isnt't really typed so make it a nice bool
        return $this->_activation == true;
    }

    /**
     * @return    int     The id for this action
     */
    public function getActionId()
    {
        return $this->_actionId;
    }

    /**
     * @return    Value    The value corresponding to this action
     */
    public function getValue()
    {
        return $this->_value;
    }
}
