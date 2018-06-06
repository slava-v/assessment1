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
     * Add new node based on $nodeData passed
     * @param $nodeData - JSON representation of a node
     */
    function addNode($nodeData);


    /**
     * Update a node
     * @param $nodeId - Id of a node
     * @param $nodeData - JSON representation of a node
     */
    function updateNode($nodeId, $nodeData);


    /**
     * Delete a node by id
     *
     * @param $nodeId - Id of a node
     */
    function deleteNode($nodeId);
}