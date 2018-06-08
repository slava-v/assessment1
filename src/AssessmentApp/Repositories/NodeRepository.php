<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/6/18
 * Time: 9:09 PM
 */

namespace AssessmentApp\Repositories;


use AssessmentApp\Entities\Node;
use AssessmentApp\Exceptions\NodeAlreadyExists;
use AssessmentApp\Repositories\Interfaces\INodeRepository;
use AssessmentApp\Repositories\Interfaces\IStorage;

class NodeRepository implements INodeRepository
{
    /**
     * @var IStorage
     */
    private $storage;

    /**
     * NodeRepository constructor.
     * @param IStorage $storage
     */
    public function __construct(IStorage $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritdoc
     */
    public function add(Node $node)
    {
        if ($this->storage->exists($node->getId())){
            throw new NodeAlreadyExists();
        }

        return $this->storage->save($node);
    }

    /**
     * @inheritdoc
     */
    public function update(Node $node)
    {
        return $this->storage->save($node);
    }

    /**
     * @inheritdoc
     */
    public function getById($nodeId)
    {
        return $this->storage->load($nodeId);
    }

    /**
     * @inheritdoc
     */
    public function delete($nodeId)
    {
        return $this->storage->delete($nodeId);
    }
}
