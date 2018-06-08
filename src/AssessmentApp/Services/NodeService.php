<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 11:22 PM
 */

namespace AssessmentApp\Services;


use AssessmentApp\Entities\Node;
use AssessmentApp\Exceptions\InvalidNodeJSONStructure;
use AssessmentApp\Exceptions\NodeNotFoundException;
use AssessmentApp\Repositories\Interfaces\INodeRepository;
use AssessmentApp\Services\Interfaces\INodeService;
use AutoMapperPlus\AutoMapperInterface;

class NodeService implements INodeService
{
    /**
     * @var INodeRepository
     */
    private $repository;
    /**
     * @var AutoMapperInterface
     */
    private $autoMapper;

    public function __construct(INodeRepository $repository, AutoMapperInterface $autoMapper)
    {
        $this->repository = $repository;
        $this->autoMapper = $autoMapper;
    }

    /**
     * @inheritdoc
     */
    public function getNode($nodeId)
    {
        if (!$this->isValidNodeId($nodeId)) {
            throw new \InvalidArgumentException('$nodeId cannot be empty or have a invalid length');
        }

        $node = $this->repository->getById($nodeId);

        return $this->autoMapper->map($node, Node::class);
    }

    /**
     * @inheritdoc
     */
    public function addNode_FromJsonData(array $nodeJsonData)
    {
        $nodeData = json_decode(json_encode($nodeJsonData));

        if (empty($nodeData)) {
            throw new InvalidNodeJSONStructure();
        }

        return $this->addNode($this->autoMapper->map($nodeData, Node::class));
    }

    /**
     * @inheritdoc
     */
    public function updateNode_FromJsonData(array $nodeJsonData)
    {
        $nodeData = json_decode(json_encode($nodeJsonData));

        if (empty($nodeData)) {
            throw new InvalidNodeJSONStructure();
        }

        return $this->updateNode($this->autoMapper->map($nodeData, Node::class));
    }

    /**
     * @inheritdoc
     */
    public function addNode(Node $node)
    {
        $node->genId();
        $result = $this->repository->add($node);
        return $result === true ? $node : false;
    }

    /**
     * @inheritdoc
     */
    public function updateNode(Node $node)
    {
        $nodeId = $node->getId();

        if (!$this->isValidNodeId($nodeId)) {
            throw new \InvalidArgumentException('$node should have a valid id');
        }

        $nodeData = $this->repository->getById($nodeId);

        if (empty($nodeData)) {
            throw new NodeNotFoundException($nodeId);
        }

        $mappedNode = $this->autoMapper->map($nodeData, Node::class);

        if (!$mappedNode instanceof Node) {
            throw new NodeNotFoundException($nodeId);
        }

        return $this->repository->update($node);
    }

    /**
     * @inheritdoc
     */
    public function deleteNode($nodeId)
    {
        if (!$this->isValidNodeId($nodeId)) {
            throw new \InvalidArgumentException('$node should have a valid id');
        }

        return $this->repository->delete($nodeId);
    }

    /**
     * Validates the node id
     *
     * @param $nodeId
     * @return bool
     */
    private function isValidNodeId($nodeId)
    {
        return !empty($nodeId) && strlen($nodeId) == 13;
    }
}