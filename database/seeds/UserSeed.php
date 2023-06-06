<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_users' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('123')
        ]);
    }
}
