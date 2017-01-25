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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DunglasTorControlExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $options = [];
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

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
