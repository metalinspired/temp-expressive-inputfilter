<?php

namespace App\Form;

use App\Entity\Article;
use Zend\Form\Form as ZendForm;
use Zend\Form\Element\{
    Select,
    Text
};

class Form
    extends ZendForm
{
    public function init()
    {
        $this->setUseAsBaseFieldset(true);
        $this
            ->setObject(new Article())
            ->add([
                'name' => 'title',
                'type' => Text::class,
                'options' => [
                    'label' => 'Title'
                ],
                'attributes' => [
                    'required' => 'required'
                ]
            ])
            ->add([
                'name' => 'alias',
                'type' => Text::class,
                'options' => [
                    'label' => 'Alias'
                ],
                'attributes' => [
                    'required' => 'required'
                ]
            ]);
    }
}