<?php 

namespace laravel\pagseguro\PaymentMethodConfig;

use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;

interface PaymentMethodConfigInterface
{

	/**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = []);

	/**
	 * @param PaymentMethodInterface $paymentMethod
	 * @return PaymentMethodConfigInterface
	 */
	public function setPaymentMethod(PaymentMethodInterface $paymentMethod);

	/**
	 * @return PaymentMethodInterface $paymentMethod
	 */
	public function getPaymentMethod();

	/**
	 * @param ConfigCollection $configCollection
	 * @return PaymentMethodConfigInterface
	 */
	public function setConfigCollection(ConfigCollection $configCollection);

	/**
	 * @return ConfigCollection
	 */
	public function getConfigCollection();

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