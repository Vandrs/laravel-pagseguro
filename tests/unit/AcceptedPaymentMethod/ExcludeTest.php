<?php 

namespace laravel\pagseguro\Tests\Unit\AcceptedPaymentMethod;


/**
 * ExcludeTag Test
 */

use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTag;

class ExcludeTagTest extends \PHPUnit_Framework_TestCase
{
	public function testEmptyPaymentMethod()
	{
		$data = ['paymentMethod' => null];
		$include = new ExcludeTag();
		$this->assertEquals($data, $include->toArray());	
	}

	public function testPaymentMethodValue()
	{
		$data = [
			'paymentMethod' => new PaymentMethod(['group' => 'CREDIT_CARD'])
		];
		$include = new ExcludeTag($data);
		$this->assertEquals($data, $include->toArray());

		$this->assertEquals($data['paymentMethod'], $include->getPaymentMethod());
	}
}