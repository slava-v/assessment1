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
     * @param $nodeId
     * @return mixed
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
     * @param Node $node
     * @return mixed
     */
    function delete(Node $node);

}