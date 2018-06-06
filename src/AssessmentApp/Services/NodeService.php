<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 11:22 PM
 */

namespace AssessmentApp\Services;


use AssessmentApp\Entities\Node;
use AssessmentApp\Services\Interfaces\INodeService;

class NodeService implements INodeService
{
    /**
     * @inheritdoc
     */
    public function getNode($nodeId)
    {
        //@todo: retrieve the node from storage (json or mysql or ...)
        return new Node();
    }
}