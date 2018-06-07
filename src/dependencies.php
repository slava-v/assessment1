<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['NodeController'] = function ($c){

    // @todo: Add database connection
    // $settings = $c->get('settings')['database'];
    $storageFolderPath = $c->get('settings')['storageFolderPath'];

    // @todo: Benchmark performance. Not sure about mapping performance
    $autoMapper = new \AutoMapperPlus\AutoMapper(new \AssessmentApp\Automappers\NodeAutoMapper());

    $storage = new \AssessmentApp\Repositories\FileStorage($storageFolderPath);
    $nodeRepository = new \AssessmentApp\Repositories\NodeRepository($storage);
    $nodeService = new \AssessmentApp\Services\NodeService($nodeRepository, $autoMapper);
    return new \AssessmentApp\Controllers\NodeController($c, $nodeService);
};
