<?php

namespace App;

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'form_elements' => [
                'factories' => [
                    Form\Form::class => Form\FormFactory::class,
                ]
            ],
            'validators' => [
                'factories' => [
                    Validator\Validator::class => Validator\ValidatorFactory::class,
                ]
            ]
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                Action\PingAction::class => Action\PingAction::class,
            ],
            'factories' => [
                Action\HomePageAction::class => Action\HomePageFactory::class,
                Action\TestAction::class => Action\TestActionFactory::class,
            ],
            'delegators' => [
                'FormElementManager' => [
                    Factory\FormElementManagerDelegatorFactory::class,
                ],
                'ValidatorManager' => [
                    Factory\ValidatorManagerDelegatorFactory::class,
                ]
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app' => [__DIR__ . '/../templates/app'],
                'error' => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
