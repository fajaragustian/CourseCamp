<?php

namespace Database\Seeders;

use App\Models\Camp;
use Illuminate\Database\Seeder;
// Jika Menggunakan STR
// use Illuminate\Support\Str;

class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $camps = [
            [
                'title' => 'SuperLearning',
                'slug' => 'Super-Learning',
                // package slug Laravel
                // 'slug' => Str::slug('Super-Learning'),
                'price' => 280000,
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
            [
                'title' => 'FastLearning',
                'slug' => 'Fast-Learning',
                // package slug Laravel
                // 'slug' => Str::slug('Super-Learning'),
                'price' => 180000,
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),

            ],
            [
                'title' => 'RegulerLearning',
                'slug' => 'Reguler-Learning',
                // package slug Laravel
                // 'slug' => Str::slug('Super-Learning'),
                'price' => 80000,
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
            ];
            // First Method Input Seeder $date camps as camp crate model action table databaseseeder
            // foreach ($camps as $key=> $camp )
            // {
            //     Camp::create($camp);
            // }
            // Second Method Kekurangn pada tipe date harus di definisikan
            Camp::insert($camps);
    }
}
