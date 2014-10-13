<?php
/*
 * This file is part of the Address package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Address\Formatter;

use Address\Country;

/**
 * Class CountryFormatter
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class CountryFormatter implements FormatterInterface
{
    const COUNTRY_CODE = '%c';

    const COUNTRY_NAME = '%a';

    /**
     * @var Country
     */
    private $country;

    /**
     * @param Country $country
     */
    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    /**
     * @param $format
     * @return string
     */
    public function format($format)
    {
        return strtr($format, [
            self::COUNTRY_NAME => $this->country->getName(),
            self::COUNTRY_CODE => $this->country->getCode()
        ]);
    }
}
