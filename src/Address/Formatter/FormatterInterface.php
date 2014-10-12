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

/**
 * Class FormatterInterface
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
interface FormatterInterface
{
    /**
     * Format a ResultInterface object using a given format string.
     *
     * @param $format
     *
     * @return string
     */
    public function format($format);
}
