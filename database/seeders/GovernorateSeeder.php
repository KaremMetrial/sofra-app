<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Governorate;

class GovernorateSeeder extends Seeder
{
    public function run()
    {
        $governorates = [
            'القاهرة',
            'الإسكندرية',
            'الجيزة',
            'الدقهلية',
            'الشرقية',
            'المنوفية',
            'القليوبية',
            'البحيرة',
            'الغربية',
            'بورسعيد',
            'دمياط',
            'الإسماعيلية',
            'السويس',
            'كفر الشيخ',
            'الفيوم',
            'بني سويف',
            'المنيا',
            'أسيوط',
            'سوهاج',
            'قنا',
            'الأقصر',
            'أسوان',
            'الوادي الجديد',
            'مطروح',
            'البحر الأحمر',
            'شمال سيناء',
            'جنوب سيناء',
        ];

        foreach ($governorates as $name) {
            Governorate::updateOrCreate(
                ['name' => $name],
                ['name' => $name]
            );
        }
    }
}
