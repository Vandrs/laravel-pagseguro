<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigCollection;

class XmlPaymentMethodConfigCollection implements XmlPartInterface
{
    /**
     * @var PaymentMethodConfigCollection
     */
    protected $paymentMethodConfigCollection;

    /**
     * Constructor
     * @param PaymentMethodConfigCollection $paymentMethodConfigCollection
     */
    public function __construct(PaymentMethodConfigCollection $paymentMethodConfigCollection)
    {
        $this->paymentMethodConfigCollection = $paymentMethodConfigCollection;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        $str = '<paymentMethodConfigs>';
        foreach ($this->paymentMethodConfigCollection as $paymentMethodConfig) {
            $xml = new XmlPaymentMethodConfig($paymentMethodConfig);
            $str .= $xml->getXmlString();
        }
        $str .= '</paymentMethodConfigs>';
        return $str;
    }

}
