<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'kattia',
            'email' => 'kattia361@hotmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
    }
}
