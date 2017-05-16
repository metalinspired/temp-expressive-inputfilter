<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class ValidatorManagerDelegatorFactory
    implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $validatorManager = $callback();

        $config = $container->has('config') ? $container->get('config') : [];
        $config = isset($config['validators']) ? $config['validators'] : [];
        (new Config($config))->configureServiceManager($validatorManager);

        return $validatorManager;
    }
}