<?php

namespace laravel\pagseguro\PaymentMethodConfig\Config;

use laravel\pagseguro\Complements\ValidationRulesInterface;
use laravel\pagseguro\Complements\ValidationRulesTrait;

class ValidationRules implements ValidationRulesInterface
{

    /**
     * @var array
     */
    protected $rules = [
        'key'   => 'Required',
        'value' => 'Required'
    ];

    /**
     * @var array
     */
    protected $messages;

    use ValidationRulesTrait;
}
