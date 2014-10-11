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
 * Class Country
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class Country
{
    /**
     * @var string The country. For example, United States of America.
     */
    protected $name;

    /**
     * @var string The ISO 3166-1 alpha-2 country code.
     */
    protected $code;

    /**
     * @param $name
     * @param $code
     */
    public function __construct($name, $code)
    {
        $this->name = (string) $name;
        $this->code = (string) $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return sprintf("%s, %s", $this->name, $this->code);
    }

    /**
     * @param  Country $country
     * @return bool
     */
    public function isEqualTo(Country $country)
    {
        return $this->getValue() === $country->getValue();
    }
}
