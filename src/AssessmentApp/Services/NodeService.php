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
        return $this->repository->getById($nodeId);
    }

    /**
     * @inheritdoc
     */
    public function addNode($nodeData)
    {
        // Validate JSON
        // Build Node entity and persist
    }

    /**
     * @inheritdoc
     */
    public function updateNode($nodeId, $nodeData)
    {
        // Validate nodeId and nodeData JSON
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