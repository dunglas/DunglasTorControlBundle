<?php

/*
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dunglas\TorControlBunle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class FunctionalTest extends WebTestCase
{
    public function testServiceRegistered()
    {
        static::bootKernel();
        $this->assertTrue(static::$kernel->getContainer()->has('torcontrol'));
    }
}
