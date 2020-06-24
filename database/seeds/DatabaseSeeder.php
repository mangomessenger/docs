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
            'name' => 'Dealing with spam and ToS violations',
        ]);

        DB::table('methods')->insert([
            'id' => 1,
            'tag_id' => 1,
            'name' => 'reportSpam',
            'description' => 'Report a new incoming chat for spam, if the peer settings of the chat allow us to do that',
            'return_type_id' => null,
        ]);

        DB::table('method_tags')->insert([
            'id' => 2,
            'tag' => 'auth',
            'name' => 'Registration/Authorization',
        ]);

        DB::table('methods')->insert([
            'id' => 2,
            'tag_id' => 2,
            'name' => 'signIn',
            'description' => 'Signs in a user with a validated phone number.',
            'return_type_id' => null,
        ]);
    }
}
