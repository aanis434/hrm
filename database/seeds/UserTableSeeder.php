<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@domain.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'is_admin'       => 1,
                'salary'         => null,
            ],

            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@domain.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'is_admin'       => 0,
                'salary'         => 30000,
            ],
        ];

        User::insert($users);
    }
}
