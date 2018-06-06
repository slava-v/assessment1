<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 8:59 PM
 */

namespace AssessmentApp\Controllers;

use AssessmentApp\Entities\NodeMetadataTypes;
use AssessmentApp\Services\Interfaces\INodeService;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class NodeController {

    private $container;
    /**
     * @var INodeService
     */
    private $nodeService;

    public function __construct(ContainerInterface $container, INodeService $nodeService)
    {
        $this->container = $container;
        $this->nodeService = $nodeService;
    }


    public function getNode(Request $request, Response $response, array $args){
        // Sample log message
        //$this->container->logger->info("Slim-Skeleton '/' route");
        $this->container->logger->info("Slim-Skeleton '/node/' route");

    }

    public function getNodeWithMetadata(Request $request, Response $response, array $args){
        $this->container->logger->info("Slim-Skeleton '/node/-meta' route");
        list($nodeId, $metaName) = $args;


        $node = $this->nodeService->getNode($nodeId);

        var_dump($node);

        return $node->getMetadata($metaName);

    }

    public function postNode($request, $response, $args)
    {
        return $this->container->renderer->render($response, 'index.phtml', $args);
    }


}