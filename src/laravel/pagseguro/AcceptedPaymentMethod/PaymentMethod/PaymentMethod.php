<?php 

namespace laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod;

use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;

class PaymentMethod implements PaymentMethodInterface
{

	/**
	 *	Group
	 *  @var string $group;
	 */
	protected $group;

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
     * Get Group
     * @return string
     */
    public function getGroup()
    {
    	return $this->group;
    }

    /**
     * Get Group
     * @param string $group
     * @return PaymentMethodInterface 
     */
    public function setGroup(string $group)
    {
    	$this->group = $group;
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