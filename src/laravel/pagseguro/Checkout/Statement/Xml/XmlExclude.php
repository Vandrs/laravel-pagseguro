<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTagInterface;

/**
 * Checkout Statement Xml ExlucdeTag
 */
class XmlExclude implements XmlPartInterface
{
    /**
     * @var ExcludeTagInterface
     */
    protected $exclude;

    /**
     * Constructor
     * @param ExcludeTagInterface $ExcludeTagInterface
     */
    public function __construct(ExcludeTagInterface $exclude)
    {
        $this->exclude = $exclude;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        return
            '<exclude>'.$this->getExcludeXmlString().'</exclude>';
    }

    /**
     * @return string XML
     */
    private function getExcludeXmlString()
    {
        $xmlPaymentMethod = new XmlPaymentMethod($this->exclude->getPaymentMethod());
        return $xmlPaymentMethod->getXmlString();
    }
}
