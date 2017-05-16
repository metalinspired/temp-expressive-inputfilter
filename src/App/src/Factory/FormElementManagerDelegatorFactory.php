<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class FormElementManagerDelegatorFactory
    implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $formElementManager = $callback();

        $config = $container->has('config') ? $container->get('config') : [];
        $config = isset($config['form_elements']) ? $config['form_elements'] : [];
        (new Config($config))->configureServiceManager($formElementManager);

        return $formElementManager;
    }
}