<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 9:11 PM
 */

namespace AssessmentApp\Repositories;


use AssessmentApp\Entities\Node;
use AssessmentApp\Repositories\Interfaces\IStorage;

class FileStorage implements IStorage
{
    private $storageFolderPath;

    public function __construct($storageFolderPath)
    {
        $this->storageFolderPath = $storageFolderPath;
    }

    /**
     * @inheritdoc
     */
    public function load($nodeId)
    {
        $fileName = $this->getFilename($nodeId);
        if (file_exists($fileName)) {
            return json_decode(file_get_contents($this->getFilename($nodeId)));
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public function save(Node $node)
    {
        file_put_contents($this->getFilename($node->getId()), json_encode($node));
    }

    /**
     * @inheritdoc
     */
    public function delete(Node $node)
    {
        $fileName = $this->getFilename($node->getId());
        if (file_exists($fileName)){
            unlink($fileName);
        }
    }

    private function getFilename($nodeId)
    {
        return "{$this->storageFolderPath}node_{$nodeId}.json";
    }
}