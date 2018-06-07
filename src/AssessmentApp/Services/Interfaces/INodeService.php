<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 11:26 PM
 */

namespace AssessmentApp\Services\Interfaces;


use AssessmentApp\Entities\Node;

interface INodeService
{
    /**
     * Will return a Node entity based on NodeId passed
     *
     * @param $nodeId
     * @return Node
     */
    function getNode($nodeId);


    /**
     * Add or update new node based on $nodeData passed
     * @param $nodeData - JSON representation of a node
     */
    function addOrUpdate(Node $nodeData);


    /**
     * Delete a node by id
     *
     * @param $nodeId - Id of a node
     */
    function deleteNode($nodeId);
}