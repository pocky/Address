<?php

namespace Address\Formatter;

use Address\Postal;

/**
 * Class PostalFormatter
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 */
class PostalFormatter implements FormatterInterface
{
    const STREET = '%S';

    const STREET_NAME = '%n';

    const STREET_NUMBER = '%u';

    const POSTAL_CODE = '%P';

    const LOCALITY = '%L';

    const REGION = '%R';

    const POST_OFFICE_BOX_NUMBER = '%B';

    const COUNTRY = '%C';

    const COUNTRY_CODE = '%c';

    const COUNTRY_NAME = '%a';

    /**
     * @var Postal
     */
    protected $postal;

    /**
     * @param Postal $postal
     */
    public function __construct(Postal $postal)
    {
        $this->postal = $postal;
    }

    /**
     * @param $format
     * @return string
     */
    public function format($format)
    {
        return strtr($format, [
            self::STREET => $this->postal->getStreet(),
            self::STREET_NUMBER => $this->postal->getStreetNumber(),
            self::STREET_NAME => $this->postal->getStreetName(),
            self::POSTAL_CODE => $this->postal->getPostalCode(),
            self::LOCALITY => $this->postal->getLocality(),
            self::REGION => $this->postal->getRegion(),
            self::POST_OFFICE_BOX_NUMBER => $this->postal->getPostOfficeBoxNumber(),
            self::COUNTRY => $this->postal->getCountry(),
            self::COUNTRY_CODE => $this->postal->getCountryCode(),
            self::COUNTRY_NAME => $this->postal->getCountryName()
        ]);
    }
}
