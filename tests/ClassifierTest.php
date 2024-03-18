<?php

use GlaivePro\IaafPoints\Classifier;
use PHPUnit\Framework\TestCase;

class ClassifierTest extends TestCase
{
	protected Classifier $classifier;

	public function setUp(): void
	{
		$this->classifier = new Classifier;
	}

    public function testOptionsCanBeRetrieved()
    {
		$options = $this->classifier->getOptions();

		$this->assertIsArray($options);

		$this->assertArrayHasKey('discipline', $options);
		$this->assertArrayHasKey('gender', $options);
		$this->assertArrayHasKey('venueType', $options);
		$this->assertArrayHasKey('edition', $options);
	}

    public function testOptionsCanBeSet()
    {
        $this->classifier->setOptions(['venueType' => 'indoor']);
		$options =  $this->classifier->getOptions();
		$this->assertEquals($options['venueType'], 'indoor');

        $this->classifier->setOptions(['venueType' => 'outdoor', 'edition' => 'latvian2013']);
		$options =  $this->classifier->getOptions();
		$this->assertEquals($options['venueType'], 'outdoor');

		$constructorTest = new \GlaivePro\IaafPoints\Classifier(['gender' => 'f', 'edition' => 'latvian2018']);
		$options = $constructorTest->getOptions();
		$this->assertEquals($options['edition'], 'latvian2018');
	}

	public function testListsEditions()
	{
		$editions = $this->classifier->getSupportedEditionKeys();

		$this->assertContains('latvian2018', $editions);
		$this->assertContains('latvian2024', $editions);
	}

	public function testListsDisciplines()
	{
		$disciplines = $this->classifier->getSupportedDisciplineKeys();

		$this->assertGreaterThan(0, count($disciplines));
		$this->assertContains('100m', $disciplines);
	}

    public function testAllConstantsAreValid()
    {
		$editions = $this->classifier->getSupportedEditionKeys();

		foreach ($editions as $edition)
			foreach (['outdoor', 'indoor', 'road', 'trail', 'field'] as $venueType)
				foreach (['m', 'f'] as $gender)
				{
					$this->classifier->setOptions(['edition' => $edition, 'gender' => $gender, 'venueType' => $venueType]);

					foreach ($this->classifier->getSupportedDisciplineKeys() as $discipline)
					{
						$this->classifier->setOptions(['discipline' => $discipline]);

						$classification = $this->classifier->getClassification(1);

						$this->assertNotNull($classification);
					}
				}
    }

	public function testClassificationLatvian2013IsCorrect()
	{
		// Empty
		$classification = $this->classifier->evaluate(null);
		$this->assertNull($classification);

		$result = 29;

		// No config
		$classification = $this->classifier->evaluate($result);
		$this->assertNull($classification);

		$this->classifier->setOptions(['edition' => 'latvian2013', 'venueType' => 'outdoor', 'gender' => 'm', 'discipline' => '200m']);
		$classification = $this->classifier->evaluate($result);
		$this->assertEquals('II j.', $classification);

		$this->classifier->setOptions(['gender' => 'f']);
		$classification = $this->classifier->evaluate($result);
		$this->assertEquals('III', $classification);

		$this->classifier->setOptions(['venueType' => 'indoor', 'gender' => 'm']);
		$classification = $this->classifier->evaluate($result);
		$this->assertEquals('III j.', $classification);

		$this->classifier->setOptions(['venueType' => 'field', 'discipline' => 'discus_throw_1.75']);
		$classification = $this->classifier->evaluate($result);
		$this->assertEquals('I j.', $classification);
	}

	public function testLegacyInterface()
	{
		$result = 29;

		$this->classifier->setOptions(['edition' => 'latvian2013', 'venueType' => 'outdoor', 'gender' => 'm', 'discipline' => '200m']);
		$classification = $this->classifier->getClassification($result);
		$this->assertEquals('II j.', $classification);
	}
}
