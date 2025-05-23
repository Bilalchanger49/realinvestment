<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
                [
                    'user_id' => 1,
                    'property_name' => 'prime commercial building',
                    'property_description' => 'This prime commercial building is located in the bustling Saddar area of Karachi, known as the heart of the city’s business and retail activities.',
                    'property_reg_no' => 12345678,
                    'property_address' => 'Karachi',
                    'property_rooms' => 3,
                    'property_kitchens' => 1,
                    'property_type' => 'Bungalow',
                    'property_price' => 15000000,
                    'property_rent' => 150000,
                    'property_share_price' => 100000,
                    'property_total_shares' => 150,
                    'property_remaining_shares' => 150,
                    'property_roi' => 9,
                ],
                [
                    'user_id' => 1,
                    'property_name' => 'Gulberg Residencia',
                    'property_description' => 'This premium residential plot is located in Gulberg Residencia, one of Islamabad’s most well-planned and sought-after housing societies.',
                    'property_reg_no' => 123456782,
                    'property_address' => 'Gulberg islamabad',
                    'property_rooms' => 3,
                    'property_kitchens' => 1,
                    'property_type' => 'Bungalow',
                    'property_price' => 10000000,
                    'property_rent' => 100000,
                    'property_share_price' => 66666,
                    'property_total_shares' => 150,
                    'property_remaining_shares' => 150,
                    'property_roi' => 8,
                ],
                [
                    'user_id' => 1,
                    'property_name' => 'affordable apartment',
                    'property_description' => 'This stylish and affordable apartment is located in Bahria Town Karachi, a rapidly growing and well-planned community known for its secure and serene lifestyle.',
                    'property_reg_no' => 123456781,
                    'property_address' => 'Karachi',
                    'property_rooms' => 3,
                    'property_kitchens' => 1,
                    'property_type' => 'Bungalow',
                    'property_price' => 8000000,
                    'property_rent' => 50000,
                    'property_share_price' => 53333,
                    'property_total_shares' => 150,
                    'property_remaining_shares' => 150,
                    'property_roi' => 7.4,
                ]
            ]
        );
    }
}
