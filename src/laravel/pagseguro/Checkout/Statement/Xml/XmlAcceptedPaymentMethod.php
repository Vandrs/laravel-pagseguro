<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\AcceptedPaymentMethod\AcceptedPaymentMethod\AcceptPaymentMethodInterface;

/**
 * Checkout Statement Xml AcceptedPaymentMethod
 * @copyright  Laravel\PagSeguro
 */
class XmlAcceptedPaymentMethod implements XmlPartInterface
{
    /**
     * @var AcceptPaymentMethodInterface
     */
    protected $acceptedPaymentMethod;

    /**
     * Constructor
     * @param AcceptPaymentMethodInterface $paymentMethod
     */
    public function __construct(AcceptPaymentMethodInterface $acceptedPaymentMethod)
    {
        $this->acceptedPaymentMethod = $acceptedPaymentMethod;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        return '<accepPaymentMethod>'.
                    $this->getIncludeXmlString().
                    $this->getExcludeXmlString().
                '</accepPaymentMethod>';
    }

    /**
     * @return string
     */
    public function getIncludeXmlString()
    {
        if ($this->acceptedPaymentMethod->getInclude()) {
            $xmlInclude = new XmlInclude($this->acceptedPaymentMethod->getInclude());
            return $xmlInclude->getXmlString();
        }
        return '';
    }


    /**
     * @return string
     */
    public function getExcludeXmlString()
    {
        if ($this->acceptedPaymentMethod->getExclude()) {
            $xmlExclude = new XmlExclude($this->acceptedPaymentMethod->getExclude());
            return $xmlInclude->getXmlString();
        }
        return '';
    }
}
