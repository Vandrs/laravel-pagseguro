<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\PaymentMethodConfig\Config\ConfigInterface;

class XmlConfigItem implements XmlPartInterface
{
    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * Constructor
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {

        $str =  '<config>'.
                    '<key>%s</key>'.
                    '<value>%s</value>'.
                '</config>';
        return sprintf($str, $this->config->getKey(), $this->config->getValue());
    }
}
