<?php

use GlaivePro\IaafPoints\YouthguardCalculator;
use PHPUnit\Framework\TestCase;

class YouthguardCalculatorTest extends TestCase
{
	protected YouthguardCalculator $calculator;

	public function setUp(): void
	{
		$this->calculator = new YouthguardCalculator;
	}

    public function testOptionsCanBeRetrieved()
    {
		$options = $this->calculator->getOptions();

		$this->assertIsArray($options);

		$this->assertArrayHasKey('discipline', $options);
		$this->assertArrayHasKey('gender', $options);
		$this->assertArrayHasKey('ageGroup', $options);
		$this->assertArrayHasKey('edition', $options);
	}

    public function testOptionsCanBeSet()
    {
        $this->calculator->setOptions(['discipline' => '60m']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['discipline'], '60m');

        $this->calculator->setOptions(['discipline' => 'long_jump', 'edition' => '2018']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['discipline'], 'long_jump');

		$constructorTest = new \GlaivePro\IaafPoints\CombinedCalculator(['gender' => 'f', 'edition' => '2018']);
		$options = $constructorTest->getOptions();
		$this->assertEquals($options['edition'], '2018');
	}

	public function testListsEditions()
	{
		$editions = $this->calculator->getSupportedEditionKeys();

		// PHP converts string keys to integers
		$this->assertContains(2018, $editions);
	}

	public function testListsDisciplines()
	{
		$disciplines = $this->calculator->getSupportedDisciplineKeys();

		$this->assertGreaterThan(0, count($disciplines));
		$this->assertContains('60m', $disciplines);
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

		$result = 8.01;

		// No params
		$points = $this->calculator->evaluate($result);
		$this->assertNull($points);

		// Fine cases
		$this->calculator->setOptions(['edition' => '2018', 'gender' => 'm', 'discipline' => '60m']);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(496, $points);

		$this->calculator->setOptions(['gender' => 'f']);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(893, $points);
	}

	public function testResultArrayWorksCorrect()
	{
		// Empty
		$points = $this->calculator->evaluateMany([]);
		$this->assertNull($points);

		$points = $this->calculator->evaluateMany(['60m' => null]);
		$this->assertNull($points['60m']);

		$points = $this->calculator->evaluateMany(['60m' => 0]);
		$this->assertNull($points['60m']);

		// Fine cases
		$results = [
			'60m' => 7.61,
			'long_jump' => 7.35,
			'ball_throw' => 56.55,
		];

		$this->calculator->setOptions(['edition' => '2018', 'gender' => 'm']);
		$points = $this->calculator->evaluateMany($results);

		$this->assertEquals(654, $points['60m']);
		$this->assertEquals(898, $points['long_jump']);
		$this->assertEquals(686, $points['ball_throw']);
		$this->assertEquals(2238, $points['total']);
	}

	public function testLegacyInterface()
	{
		// Single result
		$result = 8.01;

		$this->calculator->setOptions(['edition' => '2018', 'gender' => 'm', 'discipline' => '60m']);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(496, $points);

		// Array
		$results = [
			'60m' => 7.61,
			'long_jump' => 7.35,
			'ball_throw' => 56.55,
		];

		$this->calculator->setOptions(['edition' => '2018', 'gender' => 'm']);
		$points = $this->calculator->getPoints($results);

		$this->assertEquals(654, $points['60m']);
		$this->assertEquals(898, $points['long_jump']);
		$this->assertEquals(686, $points['ball_throw']);
		$this->assertEquals(2238, $points['total']);
	}
}
