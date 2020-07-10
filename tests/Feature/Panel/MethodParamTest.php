<?php

namespace Tests\Feature\Panel;

use App\MethodParam;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MethodParamTest extends TestCase
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
        $methodParam = factory(MethodParam::class)->make();

        $response = $this->actingAs($user)->post(route('method-param.store', 1), $methodParam->toArray());
        $response->assertRedirect(route('method.edit', 1));
    }

    public function test_admin_can_edit_type_param()
    {
        $user = factory(User::class)->create();
        $methodParam = factory(MethodParam::class)->create();

        $response = $this->actingAs($user)->put(route('method-param.update', 1), $methodParam->toArray());
        $response->assertRedirect(route('method.edit', 1));
    }

    public function test_admin_can_delete_type_param()
    {
        $user = factory(User::class)->create();
        $methodParam = factory(MethodParam::class)->create();

        $response = $this->actingAs($user)
            ->from(route('method.edit', 1))
            ->delete(route('method-param.destroy', $methodParam->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('method.edit', 1));
    }
}
