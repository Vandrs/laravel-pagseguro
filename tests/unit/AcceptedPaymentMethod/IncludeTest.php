<?php 

namespace laravel\pagseguro\Tests\Unit\AcceptedPaymentMethod;


/**
 * IncludeTag Test
 */

use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTag;

class IncludeTagTest extends \PHPUnit_Framework_TestCase
{
	public function testEmptyPaymentMethod()
	{
		$data = ['paymentMethod' => null];
		$include = new IncludeTag();
		$this->assertEquals($data, $include->toArray());	
	}

	public function testPaymentMethodValue()
	{
		$data = [
			'paymentMethod' => new PaymentMethod(['group' => 'CREDIT_CARD'])
		];
		$include = new IncludeTag($data);
		$this->assertEquals($data, $include->toArray());

		$this->assertEquals($data['paymentMethod'], $include->getPaymentMethod());
	}
}