<?php

namespace Easifyphp\Bmi;

use Easifyphp\Bmi\Abstracts\AbstractBmiCalculator;
use Easifyphp\Bmi\Enums\BmiCategory;
use Easifyphp\Bmi\Exceptions\InvalidBmiValuesException;

class BmiCalculator extends AbstractBmiCalculator
{
    /**
     * Calculate the Body Mass Index (BMI) based on weight and height.
     *
     * @throws InvalidBmiValuesException
     */
    public function calculate(int $precision = 2): float
    {
        if ($this->weight <= 0 || $this->height <= 0) {
            throw new InvalidBmiValuesException('Weight and height must be greater than zero.');
        }

        return $this->roundUp($this->weight / ($this->height * $this->height), $precision);
    }

    /**
     * Classify the given BMI into its corresponding category.
     *
     * @param float $bmi The BMI to classify.
     *
     * @throws InvalidBmiValuesException
     *
     * @return BmiCategory The category of the given BMI.
     */
    public function classify(float $bmi): BmiCategory
    {
        return match (true) {
            $bmi <= 0 => throw new InvalidBmiValuesException('BMI must be greater than zero.'),
            $bmi < 18.5 => BmiCategory::UNDERWEIGHT,
            $bmi < 25 => BmiCategory::NORMAL,
            $bmi < 30 => BmiCategory::OVERWEIGHT,
            default => BmiCategory::OBESE,
        };
    }
}
