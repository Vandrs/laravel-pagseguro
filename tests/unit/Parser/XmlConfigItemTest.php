<?php

namespace laravel\pagseguro\Tests\Unit\Parser;


use laravel\pagseguro\Checkout\Statement\Xml\XmlConfigItem;
use laravel\pagseguro\PaymentMethodConfig\Config\Config;



/**
 * XmlConfigItem Test
 */
class XmlConfigItemTest extends \PHPUnit_Framework_TestCase
{

    protected function getXmlForParseTest()
    {
        $str = "<config>".
                    "<key>vanderson</key>".
                    "<value>nunes</value>".
                "</config>";
        return $str;
    }

    public function testParse()
    {
        $config = new Config([
                'key'   => 'vanderson',
                'value' => 'nunes'
            ]);
        $xmlStr = $this->getXmlForParseTest();
        $xml = new XmlConfigItem($config);
        $this->assertEquals($xmlStr, $xml->getXmlString());
    }

    
}
