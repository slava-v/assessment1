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
}