<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 9:14 PM
 */

namespace AssessmentApp\Repositories\Interfaces;


use AssessmentApp\Entities\Node;

interface IStorage
{
    /**
     * Loads data based on nodeId
     *
     * @param string $nodeId
     * @return string
     */
    function load($nodeId);

    /**
     * Persists
     *
     * @param Node $node
     * @return mixed
     */
    function save(Node $node);

    /**
     * Deletes
     *
     * @param string $nodeId
     * @return bool
     */
    function delete($nodeId);

    /**
     * Verifies if the node exists
     *
     * @param $nodeId
     * @return boolean
     */
    function exists($nodeId);

}