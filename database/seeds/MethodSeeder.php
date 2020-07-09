<?php

use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Method::class, 20)->create()->each(function ($method) {
            factory(\App\MethodParam::class, rand(1, 5))->make()->each(function ($methodParam) use ($method) {
                $method->params()->save($methodParam);
            });
        });
    }
}
