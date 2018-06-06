<?php

use AssessmentApp\Controllers\NodeController;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/node/{nodeId}', function (Request $request, Response $response, array $args) {
    return $this->NodeController->getNode($request, $response, $args);
});

$app->get('/node/{nodeId}/{metaName:person|address}-meta', function (Request $request, Response $response, array $args) {
    return $this->NodeController->getNodeWithMetadata($request, $response, $args);
});

$app->post('/node', function (Request $request, Response $response, array $args) {
    return $this->NodeController->postNode($request, $response, $args);
});
