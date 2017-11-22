<?php

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
        $user = new \App\User;
        $user->name = 'Administrator';
        $user->email = 'admin@trackr.dev';
        $user->password = bcrypt('control');
        $user->save();
    }
}
