<?php

namespace Easifyphp\Bmi\Enums;

enum BmiCategory: string
{
    case UNDERWEIGHT = 'Underweight';
    case NORMAL = 'Normal weight';
    case OVERWEIGHT = 'Overweight';
    case OBESE = 'Obese';
}
