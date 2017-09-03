<?php 

namespace laravel\pagseguro\Tests\Unit\AcceptedPaymentMethod;


/**
 * PaymentMethod Test
 */

use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;

class PaymentMethodTest extends \PHPUnit_Framework_TestCase
{
	public function testEmptyGroup()
	{
		$data = ['group' => null];
		$paymentMethod = new PaymentMethod();
		$this->assertEquals($data, $paymentMethod->toArray());	
	}

	public function testGroupValue()
	{
		$data = ['group' => 'CREDIT_CARD'];
		$paymentMethod = new PaymentMethod($data);
		$this->assertEquals('CREDIT_CARD', $paymentMethod->getGroup());
	}
}