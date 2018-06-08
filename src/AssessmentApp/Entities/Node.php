<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 8:48 PM
 */

namespace AssessmentApp\Entities;

final class Node implements \JsonSerializable
{
    /** @var string guid */
    private $id;

    /** @var AddressMetadata|PersonMetadata */
    private $metaData;

    /** @var Node[] */
    private $leafs;

    public function __construct($id = null, NodeMetadataCollection $metaData = null, $leafs = [])
    {
        if (empty($id)){
            $this->genId();
        } else {
            $this->id = $id;
        }

        $this->metaData = new NodeMetadataCollection();
        $this->leafs = $leafs;
    }

    /**
     * @return array|Node[]
     */
    public function getLeafs()
    {
        return $this->leafs;
    }

    /**
     * @param Node $node
     * @return $this
     */
    public function addLeaf(Node $node)
    {
        $this->leafs[] = $node->id;

        return $this;
    }

    /**
     * @param PersonMetadata|AddressMetadata $metadata
     * @return Node $this
     */
    public function addMetadata($metadata)
    {
        if (($metadata instanceof PersonMetadata) === false
            && ($metadata instanceof AddressMetadata) === false) {
            throw new \InvalidArgumentException('Invalid metadata supplied');
        }

        $this->metaData[] = $metadata;

        return $this;
    }

    /**
     * Return all metadata or only some type of metadata. In case the metadata is not set for specific type, return null
     *
     * @todo: Research/Ask if EmptyObject pattern should be implemented here
     *
     * @return AddressMetadata|PersonMetadata|array
     */
    public function getMetadata($metadataTypeToReturn = null)
    {
        return $metadataTypeToReturn === null
            ? $this->metaData
            : ($this->metaData[$metadataTypeToReturn]??null);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Checks whether the leaf is contained within current node
     *
     * @param $id
     * @return boolean
     */
    public function containsLeaf($id)
    {
        return isset($this->leafs[$id]);
    }


    public function genId()
    {
        if (empty($this->id)){
            $this->id = uniqid();
        }
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}