<?php 

namespace laravel\pagseguro\PaymentMethodConfig\Config;

interface ConfigInterface 
{

	/**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = []);

	
    /**
     * @return string
     */
	public function getValue();

	/**
     * @return string
     */
	public function getKey();

	/**
	 * @param string $value
	 * @return ConfigInterface
	 */
	public function setValue($value);

	/**
	 * @param string $key
	 * @return ConfigInterface
	 */
	public function setKey($key);

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