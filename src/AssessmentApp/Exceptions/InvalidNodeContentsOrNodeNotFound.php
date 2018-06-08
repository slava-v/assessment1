<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/8/18
 * Time: 10:08 PM
 */

namespace AssessmentApp\Exceptions;


use Throwable;

class InvalidNodeContentsOrNodeNotFound extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $altMessage = 'Invalid node contents or node wasn\'t found';

        parent::__construct($message ?: $altMessage, $code, $previous);
    }
}