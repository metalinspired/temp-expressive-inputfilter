<?php

namespace App\Action;

use App\Form\Form;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class TestActionFactory
    implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new TestAction(
            $container->get(TemplateRendererInterface::class),
            $container->get('FormElementManager')->get(Form::class)
        );
    }
}