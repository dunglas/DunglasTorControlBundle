<?php

/*
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Dunglas\TorControlBundle\DunglasTorControlBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use TorControl\TorControl;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class TestKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new DunglasTorControlBundle(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'MySecretKey',
            'test'   => null,
        ]);

        $c->loadFromExtension('dunglas_tor_control', [
            'hostname'   => 'localhost',
            'port'       => 9051,
            'authmethod' => TorControl::AUTH_METHOD_NOT_SET,
            'password'   => null,
            'cookiefile' => '/tmp/foo',
            'timeout'    => 1234,
        ]);
    }
}
