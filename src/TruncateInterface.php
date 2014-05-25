<?php

/**
 * This file is part of urodoz/truncateHTML.
 *
 * (c) Albert Lacarta <urodoz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urodoz\Truncate;

/**
 * TruncateInterface
 *
 * @package   org.urodoz.truncatehtml
 * @author    Albert Lacarta <urodoz@gmail.com>
 * @license   http://www.opensource.org/licenses/MIT The MIT License
 */
interface TruncateInterface
{

    /**
     * Truncates the HTML keeping consistency on open/closing HTML tags
     *
     * @param string $text
     * @param int $length
     * @param string $ending
     * @param bool $exact
     * @param bool $considerHtml
     * @return string The truncated string
     */
    public function truncate(
        $text,
        $length = 100,
        $ending = '...',
        $exact = false,
        $considerHtml = true
    );

}
