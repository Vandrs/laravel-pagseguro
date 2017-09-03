<?php 

namespace laravel\pagseguro\PaymentMethodConfig;

use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;
use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;

class PaymentMethodConfig implements PaymentMethodConfigInterface
{
	use DataHydratorTrait, ValidateTrait {
        ValidateTrait::getHidratableVars insteadof DataHydratorTrait;
    }

    /**
     * @var ConfigCollection $configColletion
     */
    protected $configColletion;

    /**
     * @var PaymentMethodInterface $paymentMethod
     */
    protected $paymentMethod;

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
	 * @param PaymentMethodInterface $PaymentMethod
	 * @return PaymentMethodConfigInterface
	 */
	public function setPaymentMethod(PaymentMethodInterface $paymentMethod)
	{
		$this->paymentMethod = $paymentMethod;
		return $this;
	}

	/**
	 * @return PaymentMethodInterface $paymentMethod
	 */
	public function getPaymentMethod()
	{
		return $this->paymentMethod;
	}

	/**
	 * @param ConfigCollection $configCollection
	 * @return PaymentMethodConfigInterface
	 */
	public function setConfigCollection(ConfigCollection $configCollection)
	{
		$this->configCollection = $configCollection;
		return $this;
	}

	/**
	 * @return ConfigCollection
	 */
	public function getConfigCollection()
	{
		return $this->configCollection;
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