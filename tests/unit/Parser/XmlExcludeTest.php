<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlExclude;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;


/**
 * XmlPaymentExcludeTest Test
 */
class XmlExcludeTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str = "<exclude>".
                    "<paymentMethod>".
                        "<group>CREDIT_CARD</group>".
                    "</paymentMethod>".
                "</exclude>";
        return $str;
    }

    public function testParse()
    {
        $exclude = new ExcludeTag([
                'paymentMethod' => new PaymentMethod([
                    'group' => 'CREDIT_CARD'
                ])
            ]);
        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlExclude($exclude);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    
}
