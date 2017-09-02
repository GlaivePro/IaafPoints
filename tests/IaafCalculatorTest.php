<?php

use PHPUnit\Framework\TestCase;

class IaafCalculatorTest extends TestCase
{	
	public function setUp()
	{
		$this->calculator = new \GlaivePro\IaafPoints\IaafCalculator;
	}
    public function testOptionsCanBeRetrieved()
    {
		$options = $this->calculator->getOptions();
		
		$this->assertInternalType('array', $options);
		
		$this->assertArrayHasKey('discipline', $options);
		$this->assertArrayHasKey('gender', $options);
		$this->assertArrayHasKey('electronicMeasurement', $options);
		$this->assertArrayHasKey('venueType', $options);
		$this->assertArrayHasKey('edition', $options);
	}
	
	/**
     * @depends testOptionsCanBeRetrieved
     */
    public function testOptionsCanBeSet()
    {
        $this->calculator->setOptions(['venueType' => 'indoor']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['venueType'], 'indoor');
		
        $this->calculator->setOptions(['venueType' => 'outdoor','edition' => '2017']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['gender'], 'f');
		
		$constructorTest = new \GlaivePro\IaafPoints\IaafCalculator(['gender' => 'f', 'edition' => '2055']);
		$options = $constructorTest->getOptions();
		
		$this->assertEquals($options['edition'], '2055');
	}
	
    public function testAllConstantsAreValid()
    {
		$editions = $this->calculator->getSupportedEditionKeys();
		
		foreach ($editions as $edition)
			foreach (['outdoor', 'indoor'] as $venueType)
				foreach (['m', 'f'] as $gender)
				{
					$this->calculator->setOptions(['edition' => $edition, 'gender' => $gender, 'venueType' => $venueType]);
					
					foreach ($this->calculator->getSupportedDisciplineKeys() as $discipline)
					{
						$this->calculator->setOptions(['discipline' => $discipline]);
						
						$points = $this->calculator->getPoints(1);
						$this->assertNotNull($points);
					}
				}
    }
}
