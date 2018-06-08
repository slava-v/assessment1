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
        return file_put_contents($this->getFilename($node->getId()), json_encode($node)) !== false;
    }

    /**
     * @inheritdoc
     */
    public function delete($nodeId)
    {
        if ($this->exists($nodeId)){
            return unlink($this->getFilename($nodeId));
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function exists($nodeId)
    {
        return file_exists($this->getFilename($nodeId));
    }

    private function getFilename($nodeId)
    {
        return "{$this->storageFolderPath}node_{$nodeId}.json";
    }
}