<?php

namespace laravel\pagseguro\Checkout\Statement\Xml;

use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTagInterface;

/**
 * Checkout Statement Xml IncludeTag
 */
class XmlInclude implements XmlPartInterface
{
    /**
     * @var IncludeTagInterface
     */
    protected $include;

    /**
     * Constructor
     * @param IncludeTagInterface $IncludeTagInterface
     */
    public function __construct(IncludeTagInterface $include)
    {
        $this->include = $include;
    }

    /**
     * @return string
     */
    public function getXmlString()
    {
        return
            '<include>'.$this->getIncludeXmlString().'</include>';
    }

    /**
     * @return string XML
     */
    private function getIncludeXmlString()
    {
        $xmlPaymentMethod = new XmlPaymentMethod($this->include->getPaymentMethod());
        return $xmlPaymentMethod->getXmlString();
    }
}
