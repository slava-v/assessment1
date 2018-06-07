<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 11:22 PM
 */

namespace AssessmentApp\Services;


use AssessmentApp\Entities\Node;
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
        if (empty($nodeId) || strlen($nodeId) != 13){
            throw new \InvalidArgumentException('$nodeId cannot be empty or have a invalid length');
        }

        $node = $this->repository->getById($nodeId);

        return  $this->autoMapper->map($node, Node::class);
    }

    /**
     * @inheritdoc
     */
    public function addOrUpdate(Node $nodeData)
    {
        if (($nodeId = $nodeData->getId())!== ''){

            $mappedNode = null;

            if ( ($node = $this->repository->getById($nodeId)) !== null) {
                $mappedNode = $this->autoMapper->map($node, Node::class);
            }

            if ($mappedNode instanceof Node){
                $this->repository->update($nodeData);
            } else {
                $this->repository->add($nodeData);
            }
        }


    }

    /**
     * @inheritdoc
     */
    public function deleteNode($nodeId)
    {
        // Validate nodeId
        // Delete node, persist
    }
}