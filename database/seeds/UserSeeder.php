<?php

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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username' => 'donald',
            'password' => \Illuminate\Support\Facades\Hash::make("test"),
        ]);

//        factory(\App\User::class, 5)->create();
    }
}
