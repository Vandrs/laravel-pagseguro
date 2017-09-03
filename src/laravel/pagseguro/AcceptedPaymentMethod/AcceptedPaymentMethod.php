<?php

namespace laravel\pagseguro\AcceptedPaymentMethod;

use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTagInterface;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTagInterface;

class AcceptedPaymentMethod implements AcceptPaymentMethodInterface
{

	use DataHydratorTrait, ValidateTrait {
        ValidateTrait::getHidratableVars insteadof DataHydratorTrait;
    }

	/**
	 * @var IncludeTagInterface $include
	 */
	private $include;

	/**
	 * @var ExcludeTagInterface $exclude
	 */
	private $exclude;

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
     * @return IncludeTagInterface
     */
    public function getInclude()
    {
        return $this->include;
    }

    /**
     * @return ExludeTagInterface
     */
    public function getExclude()
    {
        return $this->exclude;
    }

    /**
     * @param IncludeTagInterface $include
     * @return AcceptPaymentMethodInterface
     */
    public function setInclude(IncludeTagInterface $include = null)
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @param ExcludeTagInterface $exclude
     * @return AcceptPaymentMethodInterface
     */
    public function setExclude(ExcludeTagInterface $exclude = null)
    {
        $this->exclude = $exclude;
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
