<?php

namespace App\Services;


class ProfitCalculationService
{
    public function calculateProfit(float $transactionAmount): float
    {
        return $transactionAmount * 0.02;
    }
}
