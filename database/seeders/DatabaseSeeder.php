<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Memanggil Seeder yang akan diinput
        $this->call([
            CampSeeder::class,
            CampBenetfitsSeeder::class,
            UserSeeder::class,
            RolesSeeder::class,
            UserRolesSeeder::class,
        ]);
    }
}
