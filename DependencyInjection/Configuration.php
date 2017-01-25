<?php

/*
 * This file is part of the TorControl package.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dunglas\TorControlBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dunglas_tor_control');
        $rootNode
            ->children()
                ->scalarNode('hostname')->end()
                ->scalarNode('port')->end()
                ->scalarNode('authmethod')->end()
                ->scalarNode('password')->end()
                ->scalarNode('cookiefile')->end()
                ->scalarNode('timeout')->end()
            ->end();

        return $treeBuilder;
    }
}
