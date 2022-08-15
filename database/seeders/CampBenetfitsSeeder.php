<?php

namespace Database\Seeders;

use App\Models\CampBenetfit;
use Illuminate\Database\Seeder;

class CampBenetfitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $CampBenetfits = [
            [
                'camp_id'=> 1,
                'name'=> 'Pro',
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),

            ],
            [
                'camp_id'=> 1,
                'name'=> 'Full Fasilitas',
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
            [
                'camp_id'=> 1,
                'name'=> 'Mentoring',
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
            [
                'camp_id'=> 2,
                'name'=> 'Fast',
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
            [
                'camp_id'=> 2,
                'name'=> 'Mentoring',
                 'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
            [
                'camp_id'=> 3,
                'name'=> 'Mentoring',
                'created_at'=>date('Y-m-d H:i:s',time()),
                'updated_at'=>date('Y-m-d H:i:s',time()),
            ],
        ];
        foreach ($CampBenetfits as $key=>$CampBenetfit){
            CampBenetfit::create($CampBenetfit);
        }
    }
}
