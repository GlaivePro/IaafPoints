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

		// No "842" or "843" in some tables
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

	/**
	 * @dataProvider outdoorWomenData
	 */
	public function testOutdoorWomenPoints(string $discipline, int|float $performance): void
	{
		$this->calculator->setOptions(['venueType' => 'outdoor', 'gender' => 'f', 'discipline' => $discipline]);

		$correctScore = 842;

		// No "842" in some tables
		if (in_array($discipline, ['100m', '3kmW', 'long_jump']))
			$correctScore = 843;

		// No "842" or "843" in some tables
		if (in_array($discipline, ['pole_vault']))
			$correctScore = 844;

		// :))
		if (in_array($discipline, ['high_jump']))
			$correctScore = 849;

		$this->assertEquals(
			$correctScore,
			$this->calculator->getPoints($performance)
		);
	}

	public function outdoorWomenData(): array
	{
		return $this->provide([
			'100m' => 12.78,
			'200m' => 26.12,
			'300m' => 42.31,
			'400m' => 59.86,
			'500m' => 78.50,
			'100mh' => 15.45,
			'400mh' => 66.46,
			'4x100m' => 51.50,
			'4x200m' => 109.08,
			'4x400m' => 247.82,
			'600m' => 99.20,
			'800m' => 139.37,
			'1000m' => 181.53,
			'1500m' => 289.32,
			'1mile' => 311.16,
			'2000m' => 397.23,
			'2000mSt' => 450.77,
			'3000m' => 624.12,
			'3000mSt' => 712.23,
			'2miles' => 671.51,
			'5000m' => 1079.17,
			'10000m' => 2282.29,
			'5km' => 1079,
			'10km' => 2282,
			'15km' => 3527,
			'10miles' => 3806,
			'20km' => 4816,
			'half_marathon' => 5102,
			'25km' => 6145,
			'30km' => 7505,
			'marathon' => 10904,
			'100km' => 30161,
			'3kmW' => 886,
			'5kmW' => 1529,
			'10kmW' => 3144,
			'15kmW' => 4798,
			'20kmW' => 6489,
			'30kmW' => 10305,
			'35kmW' => 12371,
			'50kmW' => 18790,
			'3000mW' => 886.88,
			'5000mW' => 1529.42,
			'10000mW' => 3144.92,
			'15000mW' => 4798.04,
			'20000mW' => 6489.80,
			'30000mW' => 10305.31,
			'35000mW' => 12371.29,
			'50000mW' => 18790.22,
			'high_jump' => 1.62,
			'pole_vault' => 3.62,
			'long_jump' => 5.28,
			'triple_jump' => 11.28,
			'shot_put' => 14.13,
			'discus_throw' => 47.49,
			'hammer_throw' => 54.39,
			'javelin_throw' => 47.21,
			'heptathlon' => 4798,
		]);
	}

	/**
	 * @dataProvider indoorMenData
	 */
	public function testIndoorMenPoints(string $discipline, int|float $performance): void
	{
		$this->calculator->setOptions(['venueType' => 'indoor', 'gender' => 'm', 'discipline' => $discipline]);

		$correctScore = 842;

		// No "842" in some tables
		if (in_array($discipline, ['55m', '60mh', 'pole_vault', 'long_jump']))
			$correctScore = 843;

		if (in_array($discipline, ['50mh', '55mh', 'high_jump']))
			$correctScore = 844;

		if (in_array($discipline, ['50m', '60m']))
			$correctScore = 845;

		$this->assertEquals(
			$correctScore,
			$this->calculator->getPoints($performance)
		);
	}

	public function indoorMenData(): array
	{
		return $this->provide([
			'50m' => 6.23,
			'55m' => 6.73,
			'60m' => 7.19,
			'50mh' => 7.38,
			'55mh' => 8.05,
			'60mh' => 8.66,
			'200m' => 23.07,
			'300m' => 36.38,
			'400m' => 51.30,
			'500m' => 67.39,
			'4x200m' => 92.05,
			'4x400m' => 208.77,
			'600m' => 84.53,
			'800m' => 118.68,
			'1000m' => 154.02,
			'1500m' => 244.41,
			'1mile' => 263.94,
			'2000m' => 334.98,
			'3000m' => 521.91,
			'2miles' => 565.26,
			'5000m' => 901.16,
			'3000mW' => 805.72,
			'5000mW' => 1357.24,
			'10000mW' => 2828.70,
			'high_jump' => 1.92,
			'pole_vault' => 4.44,
			'long_jump' => 6.63,
			'triple_jump' => 13.93,
			'shot_put' => 15.31,
			'heptathlon' => 4570,
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
