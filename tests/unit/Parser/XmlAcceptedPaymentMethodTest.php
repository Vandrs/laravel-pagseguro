<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlAcceptedPaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\AcceptedPaymentMethod;


/**
 * XmlPaymentIncludeTest Test
 */
class XmlAcceptedPaymentMethodTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str =  "<acceptedPaymentMethods>".
                    "<include>".
                        "<paymentMethod>".
                            "<group>CREDIT_CARD</group>".
                        "</paymentMethod>".
                    "</include>".
                    "<exclude>".
                        "<paymentMethod>".
                            "<group>BOLETO</group>".
                        "</paymentMethod>".
                    "</exclude>".
                "</acceptedPaymentMethods>";
        return $str;
    }

    protected function getXmlForParseIncludeTest()
    {
        $str =  "<acceptedPaymentMethods>".
                    "<include>".
                        "<paymentMethod>".
                            "<group>CREDIT_CARD</group>".
                        "</paymentMethod>".
                    "</include>".
                "</acceptedPaymentMethods>";
        return $str;
    }

    protected function getXmlForParseExcludeTest()
    {
        $str =  "<acceptedPaymentMethods>".
                    "<exclude>".
                        "<paymentMethod>".
                            "<group>BOLETO</group>".
                        "</paymentMethod>".
                    "</exclude>".
                "</acceptedPaymentMethods>";
        return $str;
    }

    public function testParse()
    {
        $include = new IncludeTag([
            'paymentMethod' => new PaymentMethod([
                'group' => 'CREDIT_CARD'
            ])
        ]);
        $exclude = new ExcludeTag([
            'paymentMethod' => new PaymentMethod([
                'group' => 'BOLETO'
            ])
        ]);
        $acceptedPaymentMethod = new AcceptedPaymentMethod([
            'include' => $include,
            'exclude' => $exclude
        ]);

        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlAcceptedPaymentMethod($acceptedPaymentMethod);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    public function testParseInclude()
    {
        $include = new IncludeTag([
            'paymentMethod' => new PaymentMethod([
                'group' => 'CREDIT_CARD'
            ])
        ]);
        $acceptedPaymentMethod = new AcceptedPaymentMethod([
            'include' => $include
        ]);

        $xmlStr = $this->getXmlForParseIncludeTest();
        $xml = new XmlAcceptedPaymentMethod($acceptedPaymentMethod);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    public function testParseExclude()
    {
        $exclude = new ExcludeTag([
            'paymentMethod' => new PaymentMethod([
                'group' => 'BOLETO'
            ])
        ]);
        $acceptedPaymentMethod = new AcceptedPaymentMethod([
            'exclude' => $exclude
        ]);

        $xmlStr = $this->getXmlForParseExcludeTest();
        $xml = new XmlAcceptedPaymentMethod($acceptedPaymentMethod);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    
}
