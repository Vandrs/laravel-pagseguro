<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlInclude;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;


/**
 * XmlPaymentIncludeTest Test
 */
class XmlIncludeTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str = "<include>".
                    "<paymentMethod>".
                        "<group>CREDIT_CARD</group>".
                    "</paymentMethod>".
                "</include>";
        return $str;
    }

    public function testParse()
    {
        $include = new IncludeTag([
                'paymentMethod' => new PaymentMethod([
                    'group' => 'CREDIT_CARD'
                ])
            ]);
        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlInclude($include);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    
}
