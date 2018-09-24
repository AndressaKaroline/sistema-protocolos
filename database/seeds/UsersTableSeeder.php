<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name'     => 'Andressa Dogado',
            'email'    => 'andressa@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
