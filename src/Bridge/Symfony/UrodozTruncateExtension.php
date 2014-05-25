<?php

/**
 * This file is part of urodoz/truncateHTML.
 *
 * (c) Albert Lacarta <urodoz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urodoz\Truncate\Bridge\Symfony;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * UrodozTruncateBundle
 *
 * @package   org.urodoz.truncatehtml
 * @author    Albert Lacarta <urodoz@gmail.com>
 * @license   http://www.opensource.org/licenses/MIT The MIT License
 */
class UrodozTruncateExtension extends Extension
{
    /**
     * {@inheritDoc}
     *
     * @param mixed[]          $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->setDefinition('urodoz_truncate', new Definition('Urodoz\Truncate\TruncateService'));
        $container->setDefinition(
            'urodoz_truncate.twig.truncateHTML',
            new Definition(
                'Urodoz\Truncate\Bridge\Twig\TruncateExtension',
                array(new Reference('urodoz_truncate'))
            )
        )->addTag('twig.extension');
    }
}
