<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;

class AdminProfitService
{
    public function sendAdminProfit($propertyId, $Amount)
    {
        DB::table('return_distributions')->insert([
            'property_id' => $propertyId,
            'user_id' => 1,
            'amount' => $Amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
