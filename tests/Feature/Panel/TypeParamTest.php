<?php

namespace Tests\Feature\Panel;

use App\Type;
use App\TypeParam;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TypeParamTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');
    }

    public function test_admin_can_create_type_param()
    {
        $user = factory(User::class)->create();
        $typeParam = factory(TypeParam::class)->make();

        $response = $this->actingAs($user)->post(route('type-params.store', 1), $typeParam->toArray());
        $response->assertRedirect(route('types.edit', 1));
    }

    public function test_admin_can_edit_type_param()
    {
        $user = factory(User::class)->create();
        $typeParam = factory(TypeParam::class)->create();

        $response = $this->actingAs($user)->put(route('type-params.update', 1), $typeParam->toArray());
        $response->assertRedirect(route('types.edit', 1));
    }

    public function test_admin_can_delete_type_param()
    {
        $user = factory(User::class)->create();
        $typeParam = factory(TypeParam::class)->create();

        $response = $this->actingAs($user)
            ->from(route('types.edit', 1))
            ->delete(route('type-params.destroy', $typeParam->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('types.edit', 1));
    }
}
