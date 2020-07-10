<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('method_tags')->insert([
            'id' => 1,
            'tag' => 'protection',
            'description' => 'Dealing with spam and ToS violations',
        ]);

        DB::table('method_tags')->insert([
            'id' => 2,
            'tag' => 'auth',
            'description' => 'Registration/Authorization',
        ]);


        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
            MethodSeeder::class,
        ]);
    }
}
