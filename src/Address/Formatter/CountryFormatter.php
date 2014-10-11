<?php

namespace Address\Formatter;

use Address\Country;

/**
 * Class CountryFormatter
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class CountryFormatter implements FormatterInterface
{
    const COUNTRY_CODE = '%c';

    const COUNTRY_NAME = '%a';

    /**
     * @var Country
     */
    protected $country;

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
