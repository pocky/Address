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

use Address\PostalAddress;

/**
 * Class PostalAddressFormatter
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class PostalAddressFormatter implements FormatterInterface
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
     * @var PostalAddress
     */
    private $postalAddress;

    /**
     * @param PostalAddress $postalAddress
     */
    public function __construct(PostalAddress $postalAddress)
    {
        $this->postalAddress = $postalAddress;
    }

    /**
     * @param $format
     * @return string
     */
    public function format($format)
    {
        return strtr($format, [
            self::STREET => $this->postalAddress->getStreet(),
            self::STREET_NUMBER => $this->postalAddress->getStreetNumber(),
            self::STREET_NAME => $this->postalAddress->getStreetName(),
            self::POSTAL_CODE => $this->postalAddress->getPostalCode(),
            self::LOCALITY => $this->postalAddress->getLocality(),
            self::REGION => $this->postalAddress->getRegion(),
            self::POST_OFFICE_BOX_NUMBER => $this->postalAddress->getPostOfficeBoxNumber(),
            self::COUNTRY => $this->postalAddress->getCountry(),
            self::COUNTRY_CODE => $this->postalAddress->getCountryCode(),
            self::COUNTRY_NAME => $this->postalAddress->getCountryName()
        ]);
    }
}
