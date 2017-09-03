<?php

namespace laravel\pagseguro\Tests\Unit\PaymentMethodConfig;

use laravel\pagseguro\PaymentMethodConfig\Config\Config;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;

class ConfigCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \InvalidArgumentException Invalid
     */
    public function testWithInteger()
    {
        ConfigCollection::factory([1]);
    }

    /**
     * Test With String
     * @expectedException \InvalidArgumentException Invalid
     */
    public function testWithString()
    {
        ConfigCollection::factory(['Meu Item']);
    }

    /**
     * Test With Object
     * @expectedException \InvalidArgumentException Invalid
     */
    public function testWithObject()
    {
        $config = new \stdClass();
        ConfigCollection::factory([$config]);
    }

    /**
     * Test With Array
     */
    public function testWithArray()
    {
        $item = [];
        $itemCollection = ConfigCollection::factory([$item]);
        $this->assertInstanceOf('laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection', $itemCollection);
        $this->assertCount(1, $itemCollection);
        $this->assertEquals(new Config($item), $itemCollection->offsetGet(0));
    }

    /**
     * Test With Item
     */
    public function testWithItem()
    {
        $item = new Config([
            'key'   => 'Vanderson',
            'value' => 'Nunes',
            
        ]);
        $collection = ConfigCollection::factory([$item]);
        $this->assertInstanceOf('laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection', $collection);
        $this->assertCount(1, $collection);
        $this->assertEquals($item, $collection->offsetGet(0));
    }

    /**
     * Test With Empty Data
     */
    public function testWithEmpty()
    {
        $collection = ConfigCollection::factory();
        $this->assertInstanceOf('laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection', $collection);
        $this->assertCount(0, $collection);
    }
}
