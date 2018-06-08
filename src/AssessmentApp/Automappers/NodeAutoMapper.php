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

        $this->registerMapping(\stdClass::class, PersonMetadata::class)
            ->forMember('type', function ($item) {
                return NodeMetadataTypes::PERSON;
            });
        $this->registerMapping(\stdClass::class, AddressMetadata::class)
            ->forMember('type', function ($item) {
                return NodeMetadataTypes::ADDRESS;
            });
        $this->registerMapping(\stdClass::class, Node::class)
            ->forMember('metaData', Operation::mapFromWithMapper(function ($item, AutoMapperInterface $mapper) {

                $result = new NodeMetadataCollection();

                if (empty($item->metaData)) {
                    return $result;
                }

                foreach ($item->metaData as $metaData) {
                    if ($metaData->type === NodeMetadataTypes::PERSON) {
                        $result->append($mapper->map($metaData, PersonMetadata::class));
                    } elseif ($metaData->type === NodeMetadataTypes::ADDRESS) {
                        $result->append($mapper->map($metaData, AddressMetadata::class));
                    }
                }
                return $result;
            }))
            ->forMember('leafs', Operation::mapTo(Node::class));
    }

}