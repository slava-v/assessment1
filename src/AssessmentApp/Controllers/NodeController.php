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
        var_dump($args);

        // Render index view
        //return $this->container->renderer->render($response, 'index.phtml', $args);
    }

    public function getNodeWithMetadata(Request $request, Response $response, array $args){
        list($nodeId, $metaName) = $args;

        $node = $this->nodeService->getNode($nodeId);

        return $node->getMetadata($metaName);

    }

    public function postNode($request, $response, $args)
    {
        return $this->container->renderer->render($response, 'index.phtml', $args);
    }


}