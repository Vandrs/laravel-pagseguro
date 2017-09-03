<?php 

namespace laravel\pagseguro\Tests\Unit\PaymentMethodConfig;

use laravel\pagseguro\PaymentMethodConfig\PaymentMethodConfig;
use laravel\pagseguro\PaymentMethodConfig\Config\ConfigCollection;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;

class PaymentMethodConfigTest extends \PHPUnit_Framework_TestCase
{
	public function testEmpty()
	{
		$data = [
			'configCollection' 	=> null,
			'paymentMethod' => null
		];
		$paymentMethodConfig = new PaymentMethodConfig();
		$this->assertEquals($data, $paymentMethodConfig->toArray());
	}

	public function testFilled()
	{
		$data = [
			'configCollection' 	=> new ConfigCollection([['key' => 'Vanderson', 'value' => 'Nunes']]),
			'paymentMethod' 	=> new PaymentMethod(['group' => 'CREDIT_CARD'])
		];
		$paymentMethodConfig = new PaymentMethodConfig($data);
		$this->assertEquals($data, $paymentMethodConfig->toArray());
	}
}