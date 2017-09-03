<?php

namespace laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag;

use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;
use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;

class ExcludeTag implements ExcludeTagInterface
{

    /**
     * @var PaymentMethodInterface $paymentMethod
     */
    protected $paymentMethod;

	use DataHydratorTrait, ValidateTrait {
        ValidateTrait::getHidratableVars insteadof DataHydratorTrait;
    }

    /**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        if (count($data)) {
            $this->hydrate($data);
        }
    }


    /**
     * Get PaymentMethod
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set PaymentMethod
     * @param PaymentMethodInterface $paymentMethod
     * @return ExcludeTagInterface
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }


    /**
     * Get Validation Rules
     * @return ValidationRules
     */
    public function getValidationRules()
    {
        return new ValidationRules();
    }

}

