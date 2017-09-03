<?php

namespace laravel\pagseguro\Tests\Unit\PaymentMethodConfig;

use laravel\pagseguro\PaymentMethodConfig\Config\Config;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;
use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfig;
use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigCollection;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;

class PaymentMethodConfigCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException Invalid
     */
    public function testWithInteger()
    {
        PaymentMethodConfigCollection::factory([1]);
    }

    /**
     * Test With String
     * @expectedException \InvalidArgumentException Invalid
     */
    public function testWithString()
    {
        PaymentMethodConfigCollection::factory(['Meu Item']);
    }

    /**
     * Test With Object
     * @expectedException \InvalidArgumentException Invalid
     */
    public function testWithObject()
    {
        $config = new \stdClass();
        PaymentMethodConfigCollection::factory([$config]);
    }

    /**
     * Test With Array
     */
    public function testWithArray()
    {
        $item = [];
        $itemCollection = PaymentMethodConfigCollection::factory([$item]);
        $this->assertInstanceOf('laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigCollection', $itemCollection);
        $this->assertCount(1, $itemCollection);
        $this->assertEquals(new PaymentMethodConfig($item), $itemCollection->offsetGet(0));
    }

    /**
     * Test With Item
     */
    public function testWithItem()
    {
        $item = new PaymentMethodConfig([
            'configCollection'  => new ConfigCollection([['key' => 'Vanderson', 'value' => 'Nunes']]),
            'paymentMethod'     => new PaymentMethod(['group' => 'CREDIT_CARD'])
        ]);
        $collection = PaymentMethodConfigCollection::factory([$item]);
        $this->assertInstanceOf('laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigCollection', $collection);
        $this->assertCount(1, $collection);
        $this->assertEquals($item, $collection->offsetGet(0));
    }

    /**
     * Test With Empty Data
     */
    public function testWithEmpty()
    {
        $collection = PaymentMethodConfigCollection::factory();
        $this->assertInstanceOf('laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfigCollection', $collection);
        $this->assertCount(0, $collection);
    }
}
