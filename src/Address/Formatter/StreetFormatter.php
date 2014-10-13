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

use Address\Street;

/**
 * Class StreetFormatter
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class StreetFormatter implements FormatterInterface
{
    const STREET_NAME = '%n';

    const STREET_NUMBER = '%u';

    /**
     * @var Street
     */
    private $street;

    /**
     * @param Street $street
     */
    public function __construct(Street $street)
    {
        $this->street = $street;
    }

    /**
     * @param $format
     * @return string
     */
    public function format($format)
    {
        return strtr($format, [
            self::STREET_NAME => $this->street->getName(),
            self::STREET_NUMBER => $this->street->getNumber()
        ]);
    }
}
