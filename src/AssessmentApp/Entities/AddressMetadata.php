<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 6/5/18
 * Time: 10:51 PM
 */

namespace AssessmentApp\Entities;


final class AddressMetadata
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