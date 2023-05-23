<?php

use Easifyphp\Bmi\BmiCalculator;
use Easifyphp\Bmi\Enums\BmiCategory;
use Easifyphp\Bmi\Exceptions\InvalidBmiValuesException;

it('calculates BMI correctly', function () {
    $calculator = new BmiCalculator(75, 1.75);
    $bmi = $calculator->calculate();
    expect($bmi)->toEqualWithDelta(24.49, 0.01);
});

it('throws InvalidBmiValuesException if weight or height is less than or equal to zero', function () {
    $calculator = new BmiCalculator(0, 1.75);
    $calculator->calculate();
})->throws(InvalidBmiValuesException::class, 'Weight and height must be greater than zero.');

it('classifies BMI correctly', function () {
    $calculator = new BmiCalculator(75, 1.75);
    $bmi = $calculator->calculate();
    $classification = $calculator->classify($bmi);
    expect($classification)->toBe(BmiCategory::NORMAL);
});

it('throws InvalidBmiValuesException if BMI is less than or equal to zero in classification', function () {
    $calculator = new BmiCalculator(75, 1.75);
    $calculator->classify(0);
})->throws(InvalidBmiValuesException::class, 'BMI must be greater than zero.');
