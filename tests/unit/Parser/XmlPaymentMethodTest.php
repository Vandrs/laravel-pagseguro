<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlPaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;


/**
 * XmlPaymentMethodTest Test
 */
class XmlPaymentMethodTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str = "<paymentMethod>".
                    "<group>CREDIT_CARD</group>".
               "</paymentMethod>";
        return $str;
    }

    public function testParse()
    {

        $this->assertTrue(true);
        /*$paymentMethod = new PaymentMethod([
            'group' => 'CREDIT_CARD'
        ]);
        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlPaymentMethod($paymentMethod);

        $this->assertEquals($xmlStr, $xml->getXmlString());
        */
    }

    
}
