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
            'method_id' => 1,
            'tag' => 'protection',
            'name' => 'Dealing with spam and ToS violations',
        ]);

        DB::table('methods')->insert([
            'id' => 1,
            'name' => 'reportSpam',
            'tag_id' => 1,
            'description' => 'Report a new incoming chat for spam, if the peer settings of the chat allow us to do that',
            'return_type' => 'InputPeer',
        ]);
    }
}
