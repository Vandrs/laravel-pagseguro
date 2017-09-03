<?php 

namespace laravel\pagseguro\Tests\Unit\PaymentMethodConfig;

use laravel\pagseguro\PaymentMethodConfig\Config\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
	public function testEmpty()
	{
		$data = [
			'key' 	=> null,
			'value' => null
		];
		$config = new Config();
		$this->assertEquals($data, $config->toArray());
	}

	public function testFilled()
	{
		$data = [
			'key' 	=> 'Vanderson',
			'value' => 'Nunes'
		];
		$config = new Config($data);
		$this->assertEquals($data, $config->toArray());
	}
}