<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run()
    {
        $menuItems = [
            // Restaurant 1 (Grill House)
            [
                'title' => 'كبسة لحم',
                'description' => 'أرز بخاري مع لحم ضأن مطبوخ مع توابل خاصة',
                'image' => 'menu_items/kabsa.jpg',
                'preparation_time' => 45,
                'price' => 55.00,
                'restaurant_id' => 1
            ],
            [
                'title' => 'مندي دجاج',
                'description' => 'دجاج مطبوخ في التنور مع أرز مندي',
                'image' => 'menu_items/mandi.jpg',
                'preparation_time' => 60,
                'price' => 40.00,
                'restaurant_id' => 1
            ],

            // Restaurant 2 (Fast Food)
            [
                'title' => 'شاورما لحم',
                'description' => 'شرائح لحم مشوية مع خضار وثومية',
                'image' => 'menu_items/shawarma.jpg',
                'preparation_time' => 25,
                'price' => 28.00,
                'restaurant_id' => 2
            ],
            [
                'title' => 'بطاطس مقلية',
                'description' => 'بطاطس مقلية مقرمشة مع صلصة خاصة',
                'image' => 'menu_items/fries.jpg',
                'preparation_time' => 15,
                'price' => 12.00,
                'restaurant_id' => 2
            ],

            // Restaurant 3 (Seafood)
            [
                'title' => 'سمك مشوي',
                'description' => 'سمك ناجل طازج مشوي مع أرز بسماري',
                'image' => 'menu_items/fish.jpg',
                'preparation_time' => 40,
                'price' => 75.00,
                'restaurant_id' => 2
            ],
            [
                'title' => 'ربيان مشوي',
                'description' => 'ربيان كبير مشوي مع صلصة الثوم',
                'image' => 'menu_items/shrimp.jpg',
                'preparation_time' => 35,
                'price' => 85.00,
                'restaurant_id' => 2
            ],

            // Add more restaurants and items following the same pattern...
        ];

        foreach ($menuItems as $item) {
            MenuItem::updateOrCreate(
                [
                    'title' => $item['title'],
                    'restaurant_id' => $item['restaurant_id']
                ],
                [
                    'description' => $item['description'],
                    'image' => $item['image'],
                    'preparation_time' => $item['preparation_time'],
                    'price' => $item['price']
                ]
            );
        }
    }
}
