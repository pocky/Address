<?php

/*
 * This file is part of the Geo package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Address;

/**
 * Class Postal
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class Postal
{
    /**
     * @var Street The complete street name
     */
    protected $street;

    /**
     * @var int The postal code
     */
    protected $postalCode;

    /**
     * @var string The locality
     */
    protected $locality;

    /**
     * @var string The region
     */
    protected $region;

    /**
     * @var int The post office box number
     */
    protected $postOfficeBoxNumber;

    /**
     * @var Country The complete country name
     */
    protected $country;

    /**
     * @param Street  $street
     * @param $postalCode
     * @param $locality
     * @param $region
     * @param $postOfficeBoxNumber
     * @param Country $country
     */
    public function __construct(
        Street $street,
        $postalCode,
        $locality,
        $region,
        $postOfficeBoxNumber,
        Country $country
    ) {
        $this->street              = $street;
        $this->postalCode          = (int) $postalCode;
        $this->locality            = (string) $locality;
        $this->region              = (string) $region;
        $this->postOfficeBoxNumber = (int) $postOfficeBoxNumber;
        $this->country             = $country;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street->getValue();
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->street->getName();
    }

    /**
     * @return int
     */
    public function getStreetNumber()
    {
        return $this->street->getNumber();
    }

    /**
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return int
     */
    public function getPostOfficeBoxNumber()
    {
        return $this->postOfficeBoxNumber;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country->getValue();
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country->getCode();
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->country->getName();
    }

    public function getValue()
    {
        return [
            'street' => $this->getStreet(),
            'postal_code' => $this->getPostalCode(),
            'locality' => $this->getLocality(),
            'region' => $this->getRegion(),
            'post_office_box_number' => $this->getPostOfficeBoxNumber(),
            'country' => $this->getCountry()
        ];
    }
}
