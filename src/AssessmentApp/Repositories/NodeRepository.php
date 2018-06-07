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
use AssessmentApp\Repositories\Interfaces\IStorage;

class NodeRepository implements INodeRepository
{
    /**
     * @var IStorage
     */
    private $storage;

    public function __construct(IStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritdoc
     */
    public function add(Node $node)
    {
        $this->storage->save($node);
        return true;
    }

    /**
     * @inheritdoc
     */
    public function update(Node $node)
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
        return $this->storage->load($nodeId);
    }

    /**
     * @inheritdoc
     */
    public function delete($nodeId)
    {
        // @todo: Method "stub" add method body
        return true;
    }


}