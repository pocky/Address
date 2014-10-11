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

    const POSTAL_CODE = '%P';

    const LOCALITY = '%L';

    const REGION = '%R';

    const POST_OFFICE_BOX_NUMBER = '%B';

    const COUNTRY = '%C';

    protected $postal;

    public function __construct(Postal $postal)
    {
        $this->postal = $postal;
    }

    public function format($format)
    {
        return strtr($format, [
            self::STREET => $this->postal->getStreet(),
            self::POSTAL_CODE => $this->postal->getPostalCode(),
            self::LOCALITY => $this->postal->getLocality(),
            self::REGION => $this->postal->getRegion(),
            self::POST_OFFICE_BOX_NUMBER => $this->postal->getPostOfficeBoxNumber(),
            self::COUNTRY => $this->postal->getCountry()
        ]);
    }
}
