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
                    'property_name' => 'Seaside Villa',
                    'property_description' => 'Own a slice of paradise with this Seaside Villa in Gwadar.',
                    'property_reg_no' => 12345678,
                    'property_address' => 'Gwadar',
                    'property_price' => 30000000,
                    'property_rent' => 150000,
                    'property_share_price' => 162162,
                    'property_total_shares' => 185,
                    'property_remaining_shares' => 185,
                ],
                [
                    'user_id' => 1,
                    'property_name' => 'Seaside Villa 1',
                    'property_description' => 'Own a slice of paradise with this Seaside Villa in Gwadar.',
                    'property_reg_no' => 123456782,
                    'property_address' => 'islamabad',
                    'property_price' => 30000000,
                    'property_rent' => 150000,
                    'property_share_price' => 162162,
                    'property_total_shares' => 185,
                    'property_remaining_shares' => 185,
                ]
            ]
        );
    }
}
