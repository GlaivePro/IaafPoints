<?php

use GlaivePro\IaafPoints\IaafCalculator;
use PHPUnit\Framework\TestCase;

/**
 * Test all the WA 2022 disciplines at a single score.
 *
 * The events are ordered as they come in the WA tables.
 */
class Wa2022Test extends TestCase
{
	protected IaafCalculator $calculator;

	public function setUp(): void
	{
		$this->calculator = new IaafCalculator(['edition' => '2022']);
	}

	/**
	 * @dataProvider outdoorMenData
	 */
	public function testOutdoorMenPoints(string $discipline, int|float $performance): void
	{
		$this->calculator->setOptions(['venueType' => 'outdoor', 'gender' => 'm', 'discipline' => $discipline]);

		$correctScore = 842;

		// No "842" in some tables
		if (in_array($discipline, ['5km', '3kmW', 'pole_vault', 'long_jump']))
			$correctScore = 843;

		// No "842" or "943" in some tables
		if (in_array($discipline, ['high_jump']))
			$correctScore = 844;

		$this->assertEquals(
			$correctScore,
			$this->calculator->getPoints($performance)
		);
	}

	public function outdoorMenData(): array
	{
		return $this->provide([
			'100m' => 11.15,
			'200m' => 22.62,
			'300m' => 35.74,
			'400m' => 50.28,
			'500m' => 66.06,
			'110mh' => 15.31,
			'400mh' => 56.23,
			'4x100m' => 43.39,
			'4x200m' => 90.81,
			'4x400m' => 204.87,
			'600m' => 82.77,
			'800m' => 116.78,
			'1000m' => 150.91,
			'1500m' => 241.09,
			'1mile' => 260.11,
			'2000m' => 331.51,
			'2000mSt' => 373.10,
			'3000m' => 518.57,
			'3000mSt' => 578.31,
			'2miles' => 558.71,
			'5000m' => 889.45,
			'10000m' => 1882.37,
			'5km' => 889,
			'10km' => 1882,
			'15km' => 2894,
			'10miles' => 3117,
			'20km' => 3917,
			'half_marathon' => 4158,
			'25km' => 5028,
			'30km' => 6171,
			'marathon' => 9045,
			'100km' => 26758,
			'3kmW' => 805,
			'5kmW' => 1357,
			'10kmW' => 2828,
			'15kmW' => 4318,
			'20kmW' => 5851,
			'30kmW' => 9399,
			'35kmW' => 11089,
			'50kmW' => 17289,
			'3000mW' => 805.72,
			'5000mW' => 1357.24,
			'10000mW' => 2828.70,
			'15000mW' => 4318.11,
			'20000mW' => 5851.47,
			'30000mW' => 9399.75,
			'35000mW' => 11089.59,
			'50000mW' => 17289.65,
			'high_jump' => 1.92,
			'pole_vault' => 4.44,
			'long_jump' => 6.63,
			'triple_jump' => 13.93,
			'shot_put' => 15.31,
			'discus_throw' => 48.06,
			'hammer_throw' => 56.66,
			'javelin_throw' => 61.69,
			'decathlon' => 6139,
		]);
	}

	protected function provide(array $data): array
	{
		array_walk(
			$data,
			fn(int|float &$value, string $key) => $value = [$key, $value],
		);

		return $data;
	}
}
