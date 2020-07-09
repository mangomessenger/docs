<?php

use App\User;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Type::class, 20)->create()->each(function ($type) {
            factory(\App\TypeParam::class, rand(1, 5))->make()->each(function ($typeParam) use ($type) {
                $type->params()->save($typeParam);
            });
        });
    }
}
