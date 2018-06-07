<?php

use AssessmentApp\Controllers\NodeController;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/node/{nodeId}', function (Request $request, Response $response, array $args) {
    return $this->NodeController->getNode($request, $response, $args);
});

$app->get('/node', function (Request $request, Response $response, array $args) {
    return $this->NodeController->postNode($request, $response, $args);
});
