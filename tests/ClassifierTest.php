<?php

use PHPUnit\Framework\TestCase;

class ClassifierTest extends TestCase
{
	public function setUp(): void
	{
		$this->classifier = new \GlaivePro\IaafPoints\Classifier;
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

	/**
     * @depends testOptionsCanBeRetrieved
     */
    public function testOptionsCanBeSet()
    {
        $this->classifier->setOptions(['venueType' => 'indoor']);
		$options =  $this->classifier->getOptions();
		$this->assertEquals($options['venueType'], 'indoor');

        $this->classifier->setOptions(['venueType' => 'outdoor', 'edition' => 'latvian2013']);
		$options =  $this->classifier->getOptions();
		$this->assertEquals($options['venueType'], 'outdoor');

		$constructorTest = new \GlaivePro\IaafPoints\IaafCalculator(['gender' => 'f', 'edition' => '2055']);
		$options = $constructorTest->getOptions();
		$this->assertEquals($options['edition'], '2055');
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
		$result = 29;

		$this->classifier->setOptions(['edition' => 'latvian2013', 'venueType' => 'outdoor', 'gender' => 'm', 'discipline' => '200m']);
		$classification = $this->classifier->getClassification($result);
		$this->assertEquals('II j.', $classification);

		$this->classifier->setOptions(['gender' => 'f']);
		$classification = $this->classifier->getClassification($result);
		$this->assertEquals('III', $classification);

		$this->classifier->setOptions(['venueType' => 'indoor', 'gender' => 'm']);
		$classification = $this->classifier->getClassification($result);
		$this->assertEquals('III j.', $classification);

		$this->classifier->setOptions(['venueType' => 'field', 'discipline' => 'discus_throw_1.75']);
		$classification = $this->classifier->getClassification($result);
		$this->assertEquals('I j.', $classification);
	}
}
