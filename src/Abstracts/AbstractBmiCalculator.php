<?php

namespace Easifyphp\Bmi\Abstracts;

use Easifyphp\Bmi\Interfaces\BmiCalculatorInterface;

abstract class AbstractBmiCalculator implements BmiCalculatorInterface
{
    /**
     * Set the weight and height for the BMI calculation.
     *
     * @param float $weight The weight in kilograms.
     * @param float $height The height in meters.
     */
    public function __construct(protected readonly float $weight, protected readonly float $height)
    {
    }

    /**
     * Internal helper function to round up a number to a given precision.
     */
    protected function roundUp(float $number, int $precision): float
    {
        $fig = 10 ** $precision;

        return ceil($number * $fig) / $fig;
    }
}
