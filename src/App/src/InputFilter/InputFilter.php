<?php

namespace App\InputFilter;

use App\Validator\Validator;
use Zend\InputFilter\InputFilter as ZendInputFilter;
use Zend\Filter\{
    StringTrim, StringToLower
};

class InputFilter
    extends ZendInputFilter
{
    public function init()
    {
        $this
            ->add([
                'name' => 'title',
                'required' => true,
                'filters' => [
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    [
                        'name' => Validator::class,
                        'options' => [
                            'foo' => 'bar'
                        ],
                    ],
                ],
            ])
            ->add([
                'name' => 'alias',
                'required' => true,
                'filters' => [
                    ['name' => StringTrim::class],
                    ['name' => StringToLower::class],
                ]
            ]);
    }
}