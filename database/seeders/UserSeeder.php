<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
             [
               'name' => 'admin',
               'email' => 'admin@gmail.com',
               'email_verified_at' => date('Y:m:d H:i:s', time() ),
               'password' => bcrypt('12345678'),
               'is_admin' => 1,
            ],
            [
               'name' => 'mentor',
               'email' => 'mentor@gmail.com',
               'email_verified_at' => date('Y:m:d H:i:s', time() ),
               'password' => bcrypt('12345678'),
               'is_admin' => 2,
            ],
             [
               'name' => 'user',
               'email' => 'user@gmail.com',
               'email_verified_at' => date('Y:m:d H:i:s', time() ),
               'password' => bcrypt('12345678'),
               'is_admin' => 0,
            ],
            ];
            foreach ($users as $key=> $user){
                User::create($user);
            }
    }
}
