<?php

use PHPUnit\Framework\TestCase;

class ConstantsTest extends TestCase
{
    public function testThrowsOnWrongEdition()
    {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Edition 1855 does not exist');

		$constants = new \GlaivePro\IaafPoints\Services\Constants('iaaf');

		$constants->edition('1855');
	}
}
