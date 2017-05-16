<?php

namespace App\Validator;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ValidatorFactory
    implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $validator = new Validator(true, $options);

        return $validator;
    }
}