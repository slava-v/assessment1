<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/6/18
 * Time: 9:50 PM
 */

namespace AssessmentApp\Automappers;


use AssessmentApp\Entities\AddressMetadata;
use AssessmentApp\Entities\Node;
use AssessmentApp\Entities\NodeDto;
use AssessmentApp\Entities\NodeMetadataCollection;
use AssessmentApp\Entities\NodeMetadataTypes;
use AssessmentApp\Entities\PersonMetadata;
use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\MappingOperation\Operation;

class NodeAutoMapper extends AutoMapperConfig
{
    public function __construct()
    {
        parent::__construct();

        $this->registerMapping(\stdClass::class, PersonMetadata::class);
        $this->registerMapping(\stdClass::class, AddressMetadata::class);
        $this->registerMapping(\stdClass::class, Node::class)
            ->forMember('metaData', Operation::mapFromWithMapper(function($item, AutoMapperInterface $mapper) {
                $result = new NodeMetadataCollection();
                foreach ($item->metaData as $metaData){
                    if ($metaData->type === NodeMetadataTypes::PERSON) {
                        $result->append($mapper->map($metaData, PersonMetadata::class));
                    } elseif ($metaData->type === NodeMetadataTypes::ADDRESS) {
                        $result->append($mapper->map($metaData, AddressMetadata::class));
                    }
                }
                return $result;
            }));
    }

}