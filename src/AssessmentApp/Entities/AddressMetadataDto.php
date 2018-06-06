<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/6/18
 * Time: 9:40 PM
 */

namespace AssessmentApp\Entities;


class AddressMetadataDto
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
}