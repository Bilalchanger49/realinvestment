<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;

class AdminProfitService
{
    public function sendAdminProfit($propertyId, $property_investment_id, $Amount)
    {
        DB::table('return_distributions')->insert([
            'property_id' => $propertyId,
            'property_investment_id' => $property_investment_id,
            'user_id' => 1,
            'amount' => $Amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
