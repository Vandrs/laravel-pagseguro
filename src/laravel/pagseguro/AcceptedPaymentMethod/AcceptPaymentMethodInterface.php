<?php

namespace laravel\pagseguro\AcceptedPaymentMethod;

use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTagInterface;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTagInterface;

interface AcceptPaymentMethodInterface
{

	public function __construct(array $data = []);

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

    /**
     * @return IncludeTagInterface
     */
    public function getInclude();

    /**
     * @return ExludeTagInterface
     */
    public function getExclude();

    /**
     * @param IncludeTagInterface $include
     * @return AcceptPaymentMethodInterface
     */
    public function setInclude(IncludeTagInterface $include = null);

    /**
     * @param ExcludeTagInterface $exclude
     * @return AcceptPaymentMethodInterface
     */
    public function setExclude(ExcludeTagInterface $exclude = null);
}