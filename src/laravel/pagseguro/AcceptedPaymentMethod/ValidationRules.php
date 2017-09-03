<?php

namespace laravel\pagseguro\AcceptedPaymentMethod;

use laravel\pagseguro\Complements\ValidationRulesInterface;
use laravel\pagseguro\Complements\ValidationRulesTrait;

/**
 * Validation Rules Object
 *
 * @category   Receiver
 * @package    Laravel\PagSeguro\Receiver
 *
 * @author     Isaque de Souza <isaquesb@gmail.com>
 * @since      2016-01-12
 *
 * @copyright  Laravel\PagSeguro
 */
class ValidationRules implements ValidationRulesInterface
{

    /**
     * @var array
     */
    protected $rules = [
        'include' => 'required_without:exclude',
        'exclude' => 'required_without:include'
    ];

    /**
     * @var array
     */
    protected $messages;

    use ValidationRulesTrait;
}
