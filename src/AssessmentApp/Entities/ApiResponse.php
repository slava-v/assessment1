<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/7/18
 * Time: 8:05 PM
 */

namespace AssessmentApp\Entities;


class ApiResponse
{
    /** @var mixed */
    public $data;

    /** @var boolean true Success, false Error */
    public $success;

    /** @var ApiError */
    public $error;

    public function __construct($data, ApiError $error = null)
    {
        $this->data = $data;
        $this->success = $error === null;
        $this->error = $error;
    }
}