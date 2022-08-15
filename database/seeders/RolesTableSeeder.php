<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Menthor',
            'description' => 'menthor',
        ]);
        DB::table('roles')->insert([
            'name' => 'Member',
            'description' => 'member',
        ]);
    }
}
