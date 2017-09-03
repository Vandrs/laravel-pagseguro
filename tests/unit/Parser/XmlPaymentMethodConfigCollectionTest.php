<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlPaymentMethodConfigCollection;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;
use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfig;
use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigCollection;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;

/**
 * XmlPaymentMethodConfigCollection Test
 */
class XmlPaymentMethodConfigCollectionTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str =  "<paymentMethodConfigs>".
                    "<paymentMethodConfig>".
                        "<paymentMethod>".
                            "<group>CREDIT_CARD</group>".
                        "</paymentMethod>".
                        "<configs>".
                            "<config>".
                                "<key>vanderson</key>".
                                "<value>nunes</value>".
                            "</config>".
                            "<config>".
                                "<key>foo</key>".
                                "<value>bar</value>".
                            "</config>".
                        "</configs>".
                    "</paymentMethodConfig>".
                "</paymentMethodConfigs>";
        return $str;
    }

    public function testParse()
    {
        $data = [
            ['key' => 'vanderson', 'value' => 'nunes'],
            ['key' => 'foo', 'value' => 'bar'],
        ];
        $configCollection = ConfigCollection::factory($data);
        $paymentMethod = new PaymentMethod(['group' => 'CREDIT_CARD']);
        $paymentMethodConfigData = [
            'configCollection' => $configCollection,
            'paymentMethod'    => $paymentMethod
        ];
        $paymentMethodConfig = new PaymentMethodConfig($paymentMethodConfigData);
        $collection = PaymentMethodConfigCollection::factory([$paymentMethodConfig]);
        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlPaymentMethodConfigCollection($collection);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    
}
