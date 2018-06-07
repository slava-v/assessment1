<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 10:51 PM
 */

namespace AssessmentApp\Entities;


class AddressMetadata extends NodeMetadata
{
    /** @var string */
    public $streetName;

    /** @var string */
    public $houseNumber;

    /** @var string */
    public $postalCode;

    /** @var string */
    public $city;

    /** @var string */
    public $country;

    public function __construct($streetName = '', $houseNumber = '', $postalCode = '', $city = '', $country = '')
    {
        $this->streetName = $streetName;
        $this->houseNumber = $houseNumber;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->country = $country;
        $this->nodeType = NodeMetadataTypes::ADDRESS;
    }
}