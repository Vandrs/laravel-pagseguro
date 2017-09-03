<?php

namespace laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod;

use laravel\pagseguro\Complements\ValidationRulesInterface;
use laravel\pagseguro\Complements\ValidationRulesTrait;

/**
 * Validation Rules Object
 *
 * @category   Shipping
 * @package    Laravel\PagSeguro\Shipping
 *
 * @author     Isaque de Souza <isaquesb@gmail.com>
 * @since      2015-12-10
 *
 * @copyright  Laravel\PagSeguro
 */
class ValidationRules implements ValidationRulesInterface
{

    /**
     * @var array
     */
    protected $rules = [
        'group' => 'Required|String'
    ];

    /**
     * @var array
     */
    protected $messages;

    use ValidationRulesTrait;
}
