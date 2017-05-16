<?php

namespace App\Validator;

use Zend\Code\Exception\RuntimeException;
use Zend\Validator\AbstractValidator;

class Validator
    extends AbstractValidator
{
    protected $test;

    public function __construct($test = false, $options = null)
    {
        $this->test = $test;
        parent::__construct($options);
    }

    public function isValid($value)
    {
        if (true !== $this->test) {
            throw new RuntimeException('no test defined ');
        }
        return true;
    }
}