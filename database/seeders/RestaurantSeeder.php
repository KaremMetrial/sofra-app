<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        Restaurant::updateOrCreate(
            ['email' => 'laziz@example.com'],
            [
                'id' => 1,
                'logo' => 'logos/restaurant1.png',
                'images' => json_encode(['images/restaurant1-1.jpg', 'images/restaurant1-2.jpg']),
                'name' => 'مطعم اللذيذ',
                'password' => Hash::make('password123'),
                'phone_number' => '01012345678',
                'whatsapp_number' => '01098765432',
                'description' => 'أفضل مطعم يقدم أشهى المأكولات العربية.',
                'min_order_amount' => 50.00,
                'delivery_fee' => 10.00,
                'rating' => 4.7,
                'open_time' => '09:00:00',
                'close_time' => '23:00:00',
                'location' => 'شارع الأطعمة، القاهرة، مصر',
                'is_active' => true,
                'city_id' => 1,
                'category_id' => 1,
            ]
        );

        Restaurant::updateOrCreate(
            ['email' => 'grillhouse@example.com'],
            [
                'id' => 2,
                'logo' => 'logos/restaurant2.png',
                'images' => json_encode(['images/restaurant2-1.jpg', 'images/restaurant2-2.jpg']),
                'name' => 'مطعم المشويات الشرقية',
                'password' => Hash::make('securepass'),
                'phone_number' => '01122334455',
                'whatsapp_number' => '01199887766',
                'description' => 'تجربة رائعة لعشاق المشويات الشرقية الأصيلة.',
                'min_order_amount' => 75.00,
                'delivery_fee' => 15.00,
                'rating' => 4.9,
                'open_time' => '12:00:00',
                'close_time' => '01:00:00',
                'location' => 'شارع المشويات، الإسكندرية، مصر',
                'is_active' => true,
                'city_id' => 2,
                'category_id' => 2,
            ]
        );
    }
}
