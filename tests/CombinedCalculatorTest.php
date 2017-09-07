<?php

use PHPUnit\Framework\TestCase;

class CombinedCalculatorTest extends TestCase
{	
	public function setUp()
	{
		$this->calculator = new \GlaivePro\IaafPoints\CombinedCalculator;
	}
	
    public function testOptionsCanBeRetrieved()
    {
		$options = $this->calculator->getOptions();
		
		$this->assertInternalType('array', $options);
		
		$this->assertArrayHasKey('discipline', $options);
		$this->assertArrayHasKey('gender', $options);
		$this->assertArrayHasKey('electronicMeasurement', $options);
		$this->assertArrayHasKey('edition', $options);
	}
	
	/**
     * @depends testOptionsCanBeRetrieved
     */
    public function testOptionsCanBeSet()
    {
        $this->calculator->setOptions(['discipline' => '100m']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['discipline'], '100m');
		
        $this->calculator->setOptions(['discipline' => '110mh','edition' => '2001']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['discipline'], '110mh');
		
		$constructorTest = new \GlaivePro\IaafPoints\IaafCalculator(['gender' => 'f', 'edition' => '2055']);
		$options = $constructorTest->getOptions();
		$this->assertEquals($options['edition'], '2055');
	}
	
    public function testAllConstantsAreValid()
    {
		$editions = $this->calculator->getSupportedEditionKeys();
		
		foreach ($editions as $edition)
			foreach (['m', 'f'] as $gender)
			{
				$this->calculator->setOptions(['edition' => $edition, 'gender' => $gender]);
				
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
		
		$this->calculator->setOptions(['edition' => '2001', 'gender' => 'm', 'discipline' => '200m']);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(922, $points);
		
		$this->calculator->setOptions(['electronicMeasurement' => false]);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(898, $points);
		
		$this->calculator->setOptions(['gender' => 'f', 'electronicMeasurement' => true]);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(1222, $points);
	}
	
	public function testResultArrayWorksCorrect()
	{
		$results = [
			'200m' => 21.61, 
			'long_jump' => 7.35, 
			'shot_put' => 16.55,
		];
		
		$this->calculator->setOptions(['edition' => '2001', 'gender' => 'm']);
		$points = $this->calculator->getPoints($results);
		
		$this->assertEquals(922, $points['200m']);
		$this->assertEquals(898, $points['long_jump']);
		$this->assertEquals(885, $points['shot_put']);
		$this->assertEquals(2705, $points['total']);
	}
}