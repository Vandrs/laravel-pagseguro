<?php

namespace laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod;

interface PaymentMethodInterface {
    
	/**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = []);


    /**
     * Get Group
     * @return string
     */
	public function getGroup();

	/**
     * Get Group
     * @param string $group
     * @return PaymentMethodInterface 
     */
	public function setGroup(string $group);


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