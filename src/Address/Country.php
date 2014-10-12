<?php
/*
 * This file is part of the Address package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Address;

use Address\Exception\InvalidCountryException;

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
     * @var
     */
    private static $countries;

    /**
     * @param $name
     * @param $code
     */
    public function __construct($name, $code)
    {
        if (!isset(self::$countries)) {
            self::$countries = require __DIR__ . '/../Resources/countries.php';
        }

        if (!array_key_exists($code, self::$countries)) {
            throw new InvalidCountryException(sprintf("Code %s is not a valid code", $code));
        }

        if ($name !== self::$countries[$code]) {
            throw new InvalidCountryException(sprintf("Country %s does not exist or not match with %s code", $name, $code));
        }

        $this->name = (string) $name;
        $this->code = (string) $code;
    }

    /**
     * @param $code
     * @return Country
     */
    public static function buildFromISOCode($code)
    {
        if (!isset(self::$countries)) {
            self::$countries = require __DIR__ . '/../Resources/countries.php';
        }

        if (!array_key_exists($code, self::$countries)) {
            throw new InvalidCountryException(sprintf("Code %s is not a valid code", $code));
        }

        return new self(self::$countries[$code], $code);
    }

    /**
     * @param $name
     * @return Country
     */
    public static function buildFromName($name)
    {
        if (!isset(self::$countries)) {
            self::$countries = require __DIR__ . '/../Resources/countries.php';
        }

        $countries = array_flip(self::$countries);

        if (!array_key_exists($name, $countries)) {
            throw new InvalidCountryException(sprintf("Name %s is not a valid name", $name));
        }

        $code = $countries[$name];

        return new self(self::$countries[$code], $code);
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
     * @return array
     */
    public function getValueAsArray()
    {
        return [
            "name" => $this->name,
            "code" => $this->code,
        ];
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
