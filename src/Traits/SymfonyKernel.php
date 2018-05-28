<?php
/**
 * Created by Noé Andrés Marcos.
 * Mail: nandrmarc@gmail.com
 * Date: 23/05/2018
 * Time: 20:44
 */

namespace App\Traits;

use Symfony\Component\DependencyInjection\Container;

trait SymfonyKernel
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->container = $kernel->getContainer();
    }
}
