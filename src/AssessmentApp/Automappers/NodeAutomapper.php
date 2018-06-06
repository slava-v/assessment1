<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/6/18
 * Time: 9:50 PM
 */

namespace AssessmentApp\Automappers;


use AssessmentApp\Entities\Node;
use AssessmentApp\Entities\NodeDto;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class NodeAutomapper extends AutoMapperConfig
{
    public function __construct()
    {
        parent::__construct();

        $this->registerMapping(Node::class, NodeDto::class);
    }

}