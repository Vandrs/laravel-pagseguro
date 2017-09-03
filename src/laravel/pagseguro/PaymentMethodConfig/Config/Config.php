<?php

namespace laravel\pagseguro\PaymentMethodConfig\Config;

use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;

class Config implements ConfigInterface
{

	use DataHydratorTrait, ValidateTrait {
        ValidateTrait::getHidratableVars insteadof DataHydratorTrait;
    }

	/**
	 * @var string $key 
	 */
	protected $key;

	/**
	 * @var string $value 
	 */
	protected $value;

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
     * @return string
     */
	public function getValue()
	{
		return $this->value;
	}

	/**
     * @return string
     */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * @param string $value
	 * @return ConfigInterface
	 */
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @param string $key
	 * @return ConfigInterface
	 */
	public function setKey($key)
	{
		$this->key = $key;
		return $this;
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