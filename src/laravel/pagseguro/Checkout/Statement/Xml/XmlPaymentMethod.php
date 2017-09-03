<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;

/**
 * Checkout Statement Xml PaymentMethod
 */
class XmlPaymentMethod implements XmlPartInterface
{
    /**
     * @var PaymentMethodInterface
     */
    protected $paymentMethod;

    /**
     * Constructor
     * @param PaymentMethodInterface $paymentMethod
     */
    public function __construct(PaymentMethodInterface $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        return
            '<paymentMethod>'.$this->getGroupXmlString().'</paymentMethod>';
    }

    /**
     * @return string XML
     */
    private function getGroupXmlString()
    {
        $str = '<group>%s</group>';
        return sprintf($str, $this->paymentMethod->getGroup());
    }
}
