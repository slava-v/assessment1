<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 8:50 PM
 */

namespace AssessmentApp\Entities;

class PersonMetadata extends NodeMetadata
{
    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    public function __construct(string $firstName = null, string $lastName = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->nodeType = NodeMetadataTypes::PERSON;
    }
}