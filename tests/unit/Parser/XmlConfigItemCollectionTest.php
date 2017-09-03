<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlConfigItemCollection;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;

/**
 * XmlConfigItemCollection Test
 */
class XmlConfigItemCollectionTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str =  "<configs>".
                    "<config>".
                        "<key>vanderson</key>".
                        "<value>nunes</value>".
                    "</config>".
                    "<config>".
                        "<key>foo</key>".
                        "<value>bar</value>".
                    "</config>".
                "</configs>";
        return $str;
    }

    public function testParse()
    {
        $data = [
            ['key' => 'vanderson', 'value' => 'nunes'],
            ['key' => 'foo', 'value' => 'bar'],
        ];
        $configCollection = ConfigCollection::factory($data);
        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlConfigItemCollection($configCollection);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    
}
