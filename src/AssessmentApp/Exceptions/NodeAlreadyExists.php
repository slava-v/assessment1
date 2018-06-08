<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/8/18
 * Time: 10:19 PM
 */

namespace AssessmentApp\Exceptions;


use Throwable;

class NodeAlreadyExists extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $altMessage = 'Node cannot be added because such node already exists';

        parent::__construct($message ?: $altMessage, $code, $previous);
    }
}
