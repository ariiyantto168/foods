<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 
              'name' => 'Admin',
              'email' => 'root@root.com',
              'role' => '2',
              'role_type' => 'A',
              'password' => bcrypt('rootroot'),
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
              'name' => 'Customer',
              'email' => 'customer@gmail.com',
              'role' => '1',
              'role_type' => 'C',
              'password' => bcrypt('123456'),
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
              'name' => 'Manager',
              'email' => 'manager@gmail.com',
              'role' => '2',
              'role_type' => 'C',
              'password' => bcrypt('123456'),
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
