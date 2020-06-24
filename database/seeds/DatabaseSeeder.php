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
        DB::table('methods')->insert([
            'id' => 1,
            'name' => 'reportSpam',
            'tag' => 'messages',
            'description' => 'Report a new incoming chat for spam, if the peer settings of the chat allow us to do that',
            'return_type' => 'InputPeer',
        ]);
    }
}
