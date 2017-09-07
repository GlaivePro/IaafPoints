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
		$this->assertEquals($options['venueType'], 'outdoor');
		
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
	
	public function testPointsAreCorrect()
	{
		$result = 21.61;
		
		$this->calculator->setOptions(['edition' => '2017', 'venueType' => 'outdoor', 'gender' => 'm', 'discipline' => '200m']);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(980, $points);
		
		$this->calculator->setOptions(['electronicMeasurement' => false]);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(946, $points);
		
		$this->calculator->setOptions(['gender' => 'f', 'electronicMeasurement' => true]);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(1279, $points);
		
		$this->calculator->setOptions(['venueType' => 'indoor', 'gender' => 'm']);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(1043, $points);
		
	}
}