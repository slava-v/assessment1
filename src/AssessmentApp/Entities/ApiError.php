<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 8:06 PM
 */

namespace AssessmentApp\Entities;


class ApiError
{
    /** @var string */
    public $code;

    /** @var string */
    public $message;

    /** @var string */
    public $helpUrl;

    public function __construct($code, $message, $helpUrl)
    {
        $this->code = $code;
        $this->message = $message;
        $this->helpUrl = $helpUrl;
    }
}
