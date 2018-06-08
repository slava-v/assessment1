<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 8:37 PM
 */

namespace AssessmentApp\Exceptions;


use Throwable;

class NodeNotFoundException extends \Exception
{
    public function __construct($nodeId, $message = "", $code = 0, Throwable $previous = null)
    {
        $altMessage = 'Specified Node "' . $nodeId . '" not found';

        parent::__construct($message ?: $altMessage, $code, $previous);
    }
}
