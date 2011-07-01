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
 *
 *
 * Updates:
 * - 2011-06-26     created
 *
 * @category        Pelshoff
 * @package         ObjectStore
 * @subpackage      Entity
 * @author          pim@pelshoff.com
 * @version         0.1
 */
class Revision
{
    /**
     * The list of actions for this revision
     *
     * @var array   An array of Action
     */
    private $_actions;

    /**
     * The description the user filled out with this revision
     *
     * @var string
     */
    private $_description;

    /**
     * The revision number
     *
     * @var int
     */
    private $_revisionId;

    /**
     * The timestamp this revision was saved
     *
     * @var int
     */
    private $_revisionTime;

    public function __construct($description, $actions = array(), $revisionId = null, $revisionTime = null)
    {
        if (!is_string($description) && !is_null($description))
        {
            throw new Exception('$description must be a string or null');
        }
        if (!$this->isValidActions($actions))
        {
            throw new Exception('$actions must be an array of Action');
        }
        if (!is_null($revisionId) && (!is_int($revisionId) || $revisionId < 1))
        {
            throw new Exception('$revisionId must be a positive int or null');
        }
        $this->_description         = $description;
        $this->_actions             = $actions;
        $this->_revisionId          = $revisionId;
        $this->_revisionTime        = $revisionTime;
    }

    /**
     * @return  array   The actions of this revision
     */
    public function getActions()
    {
        return $this->_actions;
    }

    /**
     * @return  string  The description of this revision
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return  int     The id of this revision
     */
    public function getRevisionId()
    {
        return $this->_revisionId;
    }

    /**
     * @return  int     The timestamp of this revision
     */
    public function getRevisionTime()
    {
        return $this->_revisionTime;
    }
}
