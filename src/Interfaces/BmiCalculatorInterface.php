<?php

namespace Easifyphp\Bmi\Interfaces;

use Easifyphp\Bmi\Enums\BmiCategory;

interface BmiCalculatorInterface
{
    /**
     * Calculate the Body Mass Index (BMI) based on weight and height.
     *
     * @return float The calculated BMI.
     */
    public function calculate(int $precision = 2): float;

    /**
     * Classify the given BMI into its corresponding category.
     *
     * @param float $bmi The BMI to classify.
     *
     * @return BmiCategory The category of the given BMI.
     */
    public function classify(float $bmi): BmiCategory;
}
