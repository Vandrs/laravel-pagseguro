<?php

namespace laravel\pagseguro\PaymentMethodConfig;

use laravel\pagseguro\Complements\ValidationRulesInterface;
use laravel\pagseguro\Complements\ValidationRulesTrait;

class ValidationRules implements ValidationRulesInterface
{

    /**
     * @var array
     */
    protected $rules = [
        'paymentMethod'    => 'nullable',
        'configCollection' => 'Required',
    ];

    /**
     * @var array
     */
    protected $messages;

    use ValidationRulesTrait;
}
