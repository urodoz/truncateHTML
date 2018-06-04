<?php
/**
 * This file is part of urodoz/truncateHTML.
 *
 * (c) Albert Lacarta <urodoz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urodoz\Truncate\Bridge\Twig;

use Urodoz\Truncate\TruncateInterface;

/**
 * TruncateExtension
 *
 * @package   org.urodoz.truncatehtml
 * @author    Albert Lacarta <urodoz@gmail.com>
 * @license   http://www.opensource.org/licenses/MIT The MIT License
 */
class TruncateExtension extends \Twig_Extension
{
    /**
     * @var TruncateInterface
     */
    private $truncateService;

    /**
     * Constructor
     *
     * @param TruncateInterface $truncateService
     */
    public function __construct(TruncateInterface $truncateService)
    {
        $this->truncateService = $truncateService;
    }

    /**
     * Returns the Twig functions of this extension.
     *
     * @return \Twig_SimpleFilter[]
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('truncateHTML', array($this, 'truncateHTML')),
        );
    }

    /**
     * Truncate HTML filter.
     *
     * @param string $string
     * @param int    $length
     *
     * @return string
     */
    public function truncateHTML($string, $length = 100)
    {
        return $this->truncateService->truncate($string, $length);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'urodoztruncatehtml_extension';
    }
}
