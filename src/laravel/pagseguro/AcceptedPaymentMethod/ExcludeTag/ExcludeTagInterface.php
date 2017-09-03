<?php

namespace laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag;

use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;

interface ExcludeTagInterface
{
	/**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = []);


    /**
     * Get PaymentMethod
     * @return PaymentMethodInterface
     */
    public function getPaymentMethod();

    /**
     * Set PaymentMethod
     * @param PaymentMethodInterface $paymentMethod
     * @return ExcludeTagInterface
     */
    public function setPaymentMethod(PaymentMethodInterface $paymentMethod);

    /**
     * Proxies Data Hydrate
     * @param array $data
     * @return object
     */
    public function hydrate(array $data = []);

    /**
     * Test Valid Data
     * @return bool
     */
    public function isValid();

    /**
     * Get Validator
     * Return only after hydrate
     * @return null|\Illuminate\Validation\Validator
     */
    public function getValidator();

    /**
     * Cast Array
     * @return array
     */
    public function toArray();
}

