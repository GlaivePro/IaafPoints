<?php

use GlaivePro\IaafPoints\CombinedCalculator;
use PHPUnit\Framework\TestCase;

class CombinedCalculatorTest extends TestCase
{
	protected CombinedCalculator $calculator;

	public function setUp(): void
	{
		$this->calculator = new CombinedCalculator;
	}

    public function testOptionsCanBeRetrieved()
    {
		$options = $this->calculator->getOptions();

		$this->assertIsArray($options);

		$this->assertArrayHasKey('discipline', $options);
		$this->assertArrayHasKey('gender', $options);
		$this->assertArrayHasKey('electronicMeasurement', $options);
		$this->assertArrayHasKey('edition', $options);
	}

    public function testOptionsCanBeSet()
    {
        $this->calculator->setOptions(['discipline' => '100m']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['discipline'], '100m');

        $this->calculator->setOptions(['discipline' => '110mh', 'edition' => '2001']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['discipline'], '110mh');

		$constructorTest = new \GlaivePro\IaafPoints\CombinedCalculator(['gender' => 'f', 'edition' => '2001']);
		$options = $constructorTest->getOptions();
		$this->assertEquals($options['edition'], '2001');
	}

	public function testListsDisciplines()
	{
		$disciplines = $this->calculator->getSupportedDisciplineKeys();

		$this->assertGreaterThan(0, count($disciplines));
		$this->assertContains('100m', $disciplines);
	}

	public function testListsEditions()
	{
		$editions = $this->calculator->getSupportedEditionKeys();

		// PHP converts string keys to integers
		$this->assertContains(2001, $editions);
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
		// No result
		$points = $this->calculator->evaluate(null);
		$this->assertNull($points);

		$points = $this->calculator->evaluate(0);
		$this->assertNull($points);

		$result = 21.61;

		// No params
		$points = $this->calculator->evaluate($result);
		$this->assertNull($points);

		// Fine cases
		$this->calculator->setOptions(['edition' => '2001', 'gender' => 'm', 'discipline' => '200m']);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(922, $points);

		// Trigger +.24 correction
		$this->calculator->setOptions(['electronicMeasurement' => false]);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(898, $points);

		$this->calculator->setOptions(['gender' => 'f', 'electronicMeasurement' => true]);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(1222, $points);

		// Trigger +.14 correction
		$result = 59.0;
		$this->calculator->setOptions(['electronicMeasurement' => false, 'discipline' => '400m']);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(734, $points);
	}

	public function testResultArrayWorksCorrect()
	{
		// Empty
		$points = $this->calculator->evaluateMany(null);
		$this->assertNull($points);

		$points = $this->calculator->evaluateMany(['200m' => null]);
		$this->assertNull($points['200m']);

		$points = $this->calculator->evaluateMany(['200m' => 0]);
		$this->assertNull($points['200m']);

		// Fine cases
		$results = [
			'200m' => 21.61,
			'long_jump' => 7.35,
			'shot_put' => 16.55,
		];

		$this->calculator->setOptions(['edition' => '2001', 'gender' => 'm']);
		$points = $this->calculator->evaluateMany($results);

		$this->assertEquals(922, $points['200m']);
		$this->assertEquals(898, $points['long_jump']);
		$this->assertEquals(885, $points['shot_put']);
		$this->assertEquals(2705, $points['total']);
	}

	public function testLegacyInterface()
	{
		// Single result
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

		// Array
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
