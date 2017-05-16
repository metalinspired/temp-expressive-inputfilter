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
    protected $something = false;

    public function setSomething($something)
    {
        $this->something = $something;
    }

    public function init()
    {
        if (!$this->something) {
            throw new \RuntimeException('something is false');
        }

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