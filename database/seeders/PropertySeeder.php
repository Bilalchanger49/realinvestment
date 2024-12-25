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
                    'property_description' => 'This prime commercial building is located in the bustling Saddar area of Karachi, known as the heart of the city’s business and retail activities. Spread over 300 square feet, this shop is ideal for retail businesses, showrooms, or service providers looking for maximum footfall and visibility. The shop is located on the ground floor of a busy commercial building, with a glass-front entrance that ensures excellent display opportunities. The interior is fully tiled and equipped with energy-efficient lighting, making it ready for immediate use. ',
                    'property_reg_no' => 12345678,
                    'property_address' => 'Karachi',
                    'property_price' => 40000000,
                    'property_rent' => 150000,
                    'property_share_price' => 162162,
                    'property_total_shares' => 185,
                    'property_remaining_shares' => 185,
                ],
                [
                    'user_id' => 1,
                    'property_name' => 'Gulberg Residencia',
                    'property_description' => 'This premium residential plot is located in Gulberg Residencia, one of Islamabad’s most well-planned and sought-after housing societies. The plot measures 10 marlas and is situated in a prime location near a park and commercial area, making it an excellent choice for building your dream home or as a long-term investment. Gulberg Residencia offers a secure and serene environment with wide roads, underground electricity, and modern infrastructure. The society is known for its lush green landscapes, family-friendly atmosphere, and easy access to Islamabad Expressway, connecting it to all major parts of the city.',
                    'property_reg_no' => 123456782,
                    'property_address' => 'Gulberg islamabad',
                    'property_price' => 30000000,
                    'property_rent' => 150000,
                    'property_share_price' => 162162,
                    'property_total_shares' => 185,
                    'property_remaining_shares' => 185,
                ],
                [
                    'user_id' => 1,
                    'property_name' => 'affordable apartment',
                    'property_description' => 'This stylish and affordable apartment is located in Bahria Town Karachi, a rapidly growing and well-planned community known for its secure and serene lifestyle. Spread over 950 square feet, the apartment features two spacious bedrooms, each with attached bathrooms, and a modern open kitchen that flows into the living and dining areas. The apartment is equipped with top-notch finishes, including tiled flooring, ceiling-mounted LED lighting, and energy-efficient fixtures. A private balcony provides stunning views of Bahria Town’s lush green parks and wide, tree-lined streets.',
                    'property_reg_no' => 123456781,
                    'property_address' => 'Karachi',
                    'property_price' => 15000000,
                    'property_rent' => 60000,
                    'property_share_price' => 162162,
                    'property_total_shares' => 185,
                    'property_remaining_shares' => 185,
                ]
            ]
        );
    }
}
