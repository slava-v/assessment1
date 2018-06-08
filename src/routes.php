<?php

use AssessmentApp\Controllers\NodeController;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/node/{nodeId}', function (Request $request, Response $response, array $args) {
    return $this->NodeController->getNode($request, $response, $args);
});

$app->post('/node', function (Request $request, Response $response, array $args) {
    return $this->NodeController->addNode($request, $response, $args);
});

$app->delete('/node/{nodeId}', function (Request $request, Response $response, array $args) {
    return $this->NodeController->deleteNode($request, $response, $args);
});

$app->patch('/node/{nodeId}', function (Request $request, Response $response, array $args) {
    return $this->NodeController->modifyNode($request, $response, $args);
});
