<?php

use PHPUnit\Framework\TestCase;

class IaafCalculatorTest extends TestCase
{
	public function setUp(): void
	{
		$this->calculator = new \GlaivePro\IaafPoints\IaafCalculator;
	}

    public function testOptionsCanBeRetrieved()
    {
		$options = $this->calculator->getOptions();

		$this->assertIsArray($options);

		$this->assertArrayHasKey('discipline', $options);
		$this->assertArrayHasKey('gender', $options);
		$this->assertArrayHasKey('electronicMeasurement', $options);
		$this->assertArrayHasKey('venueType', $options);
		$this->assertArrayHasKey('edition', $options);
	}

    public function testOptionsCanBeSet()
    {
        $this->calculator->setOptions(['venueType' => 'indoor']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['venueType'], 'indoor');

        $this->calculator->setOptions(['venueType' => 'outdoor', 'edition' => '2017']);
		$options =  $this->calculator->getOptions();
		$this->assertEquals($options['venueType'], 'outdoor');

		$constructorTest = new \GlaivePro\IaafPoints\IaafCalculator(['gender' => 'f', 'edition' => '2017']);
		$options = $constructorTest->getOptions();
		$this->assertEquals($options['edition'], '2017');
	}

	public function testListsEditions()
	{
		$editions = $this->calculator->getSupportedEditionKeys();

		// PHP converts string keys to integers
		$this->assertContains(2017, $editions);
	}

	public function testListsDisciplines()
	{
		$disciplines = $this->calculator->getSupportedDisciplineKeys();

		$this->assertGreaterThan(0, count($disciplines));
		$this->assertContains('100m', $disciplines);
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
		// No result
		$points = $this->calculator->evaluate(null);
		$this->assertNull($points);

		// No result
		$points = $this->calculator->evaluate(0);
		$this->assertNull($points);

		$result = 21.61;

		// Params not set
		$points = $this->calculator->evaluate($result);
		$this->assertNull($points);

		// Good cases
		$this->calculator->setOptions(['edition' => '2017', 'venueType' => 'outdoor', 'gender' => 'm', 'discipline' => '200m']);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(980, $points);

		$this->calculator->setOptions(['electronicMeasurement' => false]);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(946, $points);

		// Trigger +.24 correction
		$this->calculator->setOptions(['gender' => 'f', 'electronicMeasurement' => true]);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(1279, $points);

		$this->calculator->setOptions(['venueType' => 'indoor', 'gender' => 'm']);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(1043, $points);

		// Trigger .14 correction
		$result = 44.0;
		$this->calculator->setOptions(['discipline' => '300m', 'electronicMeasurement' => false]);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(346, $points);

		// Result worse than reference result
		$result = 59.0;
		$this->calculator->setOptions(['discipline' => '300m', 'electronicMeasurement' => false]);
		$points = $this->calculator->evaluate($result);
		$this->assertEquals(0, $points);
	}

	public function testLegacyInterface()
	{
		$result = 21.61;

		$this->calculator->setOptions(['edition' => '2017', 'venueType' => 'outdoor', 'gender' => 'm', 'discipline' => '200m']);
		$points = $this->calculator->getPoints($result);
		$this->assertEquals(980, $points);
	}
}
