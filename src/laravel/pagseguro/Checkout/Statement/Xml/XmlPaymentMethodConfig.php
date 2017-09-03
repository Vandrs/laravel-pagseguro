<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigInterface;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;

class XmlPaymentMethodConfig implements XmlPartInterface
{
    /**
     * @var PaymentMethoConfigInterface
     */
    protected $paymentMethodConfig;

    /**
     * Constructor
     * @param PaymentMethoConfigInterface $paymentMethodConfig
     */
    public function __construct(PaymentMethodConfigInterface $paymentMethodConfig)
    {
        $this->paymentMethodConfig = $paymentMethodConfig;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        $str =  '<paymentMethodConfig>'.
                    $this->getPaymentMethodXmlString($this->paymentMethodConfig->getPaymentMethod()).
                    $this->getConfigCollectionXmlString($this->paymentMethodConfig->getConfigCollection()).
                '</paymentMethodConfig>';

        return $str;
    }

    /**
     * @param PaymentMethodInterface $paymentMethod
     * @return string XML
     */
    private function getPaymentMethodXmlString(PaymentMethodInterface $paymentMethod)
    {
        $xml = new XmlPaymentMethod($paymentMethod);
        return $xml->getXmlString();
    }

    /**
     * @param ConfigCollection $configCollection
     * @return string XML
     */
    private function getConfigCollectionXmlString(ConfigCollection $configCollection)
    {
        $xml = new XmlConfigItemCollection($configCollection);
        return $xml->getXmlString();
    }
}
