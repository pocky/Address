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
 * Class Street
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class Street
{
    /**
     * @var int The number of the street.
     */
    protected $number;

    /**
     * @var string The street name
     */
    protected $name;

    /**
     * @param $number
     * @param $street
     */
    public function __construct($number, $name)
    {
        $this->number = (int) $number;
        $this->name   = (string) $name;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  null   $separator
     * @return string
     */
    public function getValue($separator = null)
    {
        return sprintf("%s%s %s", $this->number, $separator, $this->name);
    }

    /**
     * @param  Street $street
     * @return bool
     */
    public function isEqualTo(Street $street)
    {
        return $this->getValue() === $street->getValue();
    }
}
