<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/6/18
 * Time: 9:09 PM
 */

namespace AssessmentApp\Repositories;


use AssessmentApp\Entities\Node;
use AssessmentApp\Repositories\Interfaces\INodeRepository;

class NodeRepository implements INodeRepository
{

    /**
     * @inheritdoc
     */
    public function addOrUpdate(Node $node)
    {
        // @todo: Method "stub" add method body
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getById($nodeId)
    {
        // @todo: Method "stub" add method body
        return new Node();
    }

    /**
     * @inheritdoc
     */
    public function deleteNode($nodeId)
    {
        // @todo: Method "stub" add method body
        return true;
    }
}