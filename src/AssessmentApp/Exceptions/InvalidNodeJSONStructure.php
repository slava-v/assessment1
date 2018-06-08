<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/8/18
 * Time: 9:21 PM
 */

namespace AssessmentApp\Exceptions;


use AssessmentApp\Entities\Node;
use Throwable;

class InvalidNodeJSONStructure extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $altMessage = 'Invalid JSON structure for ' . Node::class;

        parent::__construct($message ?: $altMessage, $code, $previous);
    }
}
