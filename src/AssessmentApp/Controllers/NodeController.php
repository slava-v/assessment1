<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 8:59 PM
 */

namespace AssessmentApp\Controllers;

use AssessmentApp\Entities\ApiError;
use AssessmentApp\Entities\ApiResponse;
use AssessmentApp\Entities\Node;
use AssessmentApp\Services\Interfaces\INodeService;
use Interop\Container\ContainerInterface;
use Slim\Exception\NotFoundException;
use Slim\Http\Request;
use Slim\Http\Response;

class NodeController
{

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


    public function getNode(Request $request, Response $response, array $args)
    {
        $nodeId = $args['nodeId'];

        try {
            $node = $this->nodeService->getNode($nodeId);

            if ($node instanceof Node) {
                return $response->withJson(new ApiResponse($node));
            } else {
                throw new NotFoundException($request, $response);
            }

        } catch (\Exception $e) {

            return $response->withJson(
                new ApiResponse(null,
                    new ApiError($e->getCode(), $e->getMessage(), '')
                ),
                404
            );
        }
    }

    public function addNode($request, $response, $args)
    {
        try {
            $newNode = $request->getParsedBody();

            $result = $this->nodeService->addNode_FromJsonData($newNode);

            if ($result) {
                return $response->withJson(new ApiResponse(['newId' =>$result->getId()]));
            } else {
                return $response->withJson(
                    new ApiResponse(null, new ApiError(0, 'There was an error while adding the Node', '')),
                    500
                );
            }

        } catch (\Exception $e){
            return $response->withJson(
                new ApiResponse(null,
                    new ApiError($e->getCode(), $e->getMessage(), '')
                ),
                404
            );
        }
    }

    public function modifyNode($request, $response, $args)
    {
        try {
            $nodeChanges = $request->getParsedBody();

            $result = $this->nodeService->updateNode_FromJsonData($nodeChanges);

            if ($result) {
                return $response->withJson(new ApiResponse('ok'));
            } else {
                return $response->withJson(
                    new ApiResponse(null, new ApiError(0, 'There was an error while modifying the Node', '')),
                    500
                );
            }

        } catch (\Exception $e){
            return $response->withJson(
                new ApiResponse(null,
                    new ApiError($e->getCode(), $e->getMessage(), '')
                ),
                404
            );
        }
    }

    public function deleteNode($request, $response, $args)
    {
        try {
            $nodeId = $args['nodeId'];

            $result = $this->nodeService->deleteNode($nodeId);

            if ($result) {
                return $response->withJson(new ApiResponse('ok'));
            } else {
                return $response->withJson(
                    new ApiResponse(null, new ApiError(0, 'There was an error while deleting the Node', '')),
                    500
                );
            }

        } catch (\Exception $e){
            return $response->withJson(
                new ApiResponse(null,
                    new ApiError($e->getCode(), $e->getMessage(), '')
                ),
                404
            );
        }
    }


}