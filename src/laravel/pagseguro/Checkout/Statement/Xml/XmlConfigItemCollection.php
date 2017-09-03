<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigInterface;

class XmlConfigItemCollection implements XmlPartInterface
{
    /**
     * @var ConfigCollection
     */
    protected $configCollection;

    /**
     * Constructor
     * @param ConfigCollection $configCollection
     */
    public function __construct(ConfigCollection $configCollection)
    {
        $this->configCollection = $configCollection;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        $str =  '<configs>';
        foreach($this->configCollection as $config) {
            $str .= $this->getXmlConfigString($config);
        }
        $str .= '</configs>';
        return $str;
    }

    /**
     * @return string
     */
    public function getXmlConfigString(ConfigInterface $config)
    {
        $xml = new XmlConfigItem($config);
        return $xml->getXmlString();
    }
}
