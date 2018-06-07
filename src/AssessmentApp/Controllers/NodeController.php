<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 8:59 PM
 */

namespace AssessmentApp\Controllers;

use AssessmentApp\Entities\AddressMetadata;
use AssessmentApp\Entities\ApiResponse;
use AssessmentApp\Entities\Node;
use AssessmentApp\Entities\NodeMetadataTypes;
use AssessmentApp\Entities\PersonMetadata;
use AssessmentApp\Services\Interfaces\INodeService;
use Interop\Container\ContainerInterface;
use Slim\Exception\NotFoundException;
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
        $nodeId = $args['nodeId'];

        $node = $this->nodeService->getNode($nodeId);

        if ($node instanceof Node){
            return $newResponse = $response->withJson(new ApiResponse($node));
        } else {
            return new NotFoundException($request, $response);
        }
    }

    public function postNode($request, $response, $args)
    {
        $existingNode = $this->nodeService->getNode('5b197b67d5f8c');

        $node = new Node();
        $node->addMetadata(new PersonMetadata('Marry', 'P'))
            ->addMetadata(new AddressMetadata('Main', 10, 'PS002'))
            ->addLeaf($existingNode);

        $this->nodeService->addOrUpdate($node);
    }


}