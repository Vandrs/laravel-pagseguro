<?php

namespace laravel\pagseguro\Tests\Unit\AcceptedPaymentMethod;

use laravel\pagseguro\AcceptedPaymentMethod\AcceptedPaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTag;

class AcceptedPaymentMethodTest extends \PHPUnit_Framework_TestCase
{
	public function testEmpty()
	{
		$data = [
			'include' => null,
			'exclude' => null
		];

		$acceptedPayment = new AcceptedPaymentMethod($data);
		$this->assertEquals($data, $acceptedPayment->toArray());
	}

	
	public function testInclude()
	{
		$data = [
			'include' => new IncludeTag(),
			'exclude' => null
		];

		$acceptedPayment = new AcceptedPaymentMethod($data);
		$this->assertEquals($data, $acceptedPayment->toArray());
	}

	public function testExclude()
	{
		$data = [
			'exclude' => new ExcludeTag(),
			'include' => null
		];

		$acceptedPayment = new AcceptedPaymentMethod($data);
		$this->assertEquals($data, $acceptedPayment->toArray());
	}
	
}