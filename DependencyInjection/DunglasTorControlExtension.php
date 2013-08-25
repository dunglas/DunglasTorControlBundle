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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class DunglasTorControlExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $options = array();
        if (isset($config['hostname'])) {
            $options['hostname'] = $config['hostname'];
        }

        if (isset($config['port'])) {
            $options['port'] = $config['port'];
        }

        if (isset($config['authmethod'])) {
            switch ($config['authmethod']) {
                case 'null':
                    $options['authmethod'] = '%dunglas_tor_control.auth_method_null%';
                    break;

                case 'password':
                    $options['authmethod'] = '%dunglas_tor_control.auth_method_hashedpassword%';
                    break;

                case 'cookie':
                    $options['authmethod'] = '%dunglas_tor_control.auth_method_cookie%';
                    break;
            }
        }

        if (isset($config['password'])) {
            $options['password'] = $config['password'];
        }

        if (isset($config['cookiefile'])) {
            $options['cookiefile'] = $config['cookiefile'];
        }

        if (isset($config['timeout'])) {
            $options['timeout'] = $config['timeout'];
        }

        $container->setParameter('dunglas_tor_control.options', $options);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

}
