<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/6/18
 * Time: 9:09 PM
 */

namespace AssessmentApp\Repositories\Interfaces;


use AssessmentApp\Entities\Node;

interface INodeRepository
{
    /**
     * Get a node based on its ID
     *
     * @param $nodeId
     * @return Node
     */
    function getById($nodeId);

    /**
     * Adds a new Node
     * @param Node $node
     * @return boolean
     */
    function add(Node $node);

    /**
     * Updates existing node
     * @param Node $node
     * @return boolean
     */
    function update(Node $node);

    /**
     * Delete a node
     *
     * @param $nodeId
     * @return boolean
     */
    function delete($nodeId);
}