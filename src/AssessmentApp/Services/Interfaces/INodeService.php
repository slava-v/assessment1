<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 11:26 PM
 */

namespace AssessmentApp\Services\Interfaces;


use AssessmentApp\Entities\Node;
use AssessmentApp\Exceptions\InvalidNodeJSONStructure;

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
     * Adds a new node based on json node data
     *
     * @param array $nodeJsonData
     * @throws InvalidNodeJSONStructure
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    function addNode_FromJsonData(array $nodeJsonData);

    /**
     * Updates a node based on node structure in json format.
     *
     * @param array $nodeJsonData
     * @throws InvalidNodeJSONStructure
     * @throws \AutoMapperPlus\Exception\UnregisteredMappingException
     */
    function updateNode_FromJsonData(array $nodeJsonData);

    /**
     * Add new node based on $nodeData passed
     *
     * @param $node - JSON representation of a node
     * @return boolean|Node
     */
    function addNode(Node $node);

    /**
     * Update existing node based on $nodeData passed
     *
     * @param $node - JSON representation of a node
     */
    function updateNode(Node $node);

    /**
     * Delete a node by id
     *
     * @param $nodeId - Id of a node
     */
    function deleteNode($nodeId);
}
