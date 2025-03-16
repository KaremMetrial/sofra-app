<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'مطاعم شعبية',
            'مطاعم فاخرة',
            'مطاعم بيتزا',
            'مطاعم برجر',
            'مطاعم مشاوي',
            'مطاعم هندية',
            'مطاعم صينية',
            'مطاعم سوشي',
            'مطاعم مأكولات بحرية',
            'مطاعم نباتية',
            'محلات حلويات',
            'محلات مخبوزات',
            'مطاعم لبنانية',
            'مطاعم تركية',
            'كافيهات',
        ];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['name' => $name],
                ['name' => $name] 
            );
        }
    }
}
