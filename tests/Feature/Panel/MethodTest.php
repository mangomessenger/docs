<?php

namespace Tests\Feature\Panel;

use App\Method;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MethodTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');
    }

    public function test_admin_can_create_method()
    {
        $user = factory(User::class)->create();
        $method = factory(Method::class)->make();

        $response = $this->actingAs($user)->post(route('method.store'), $method->toArray());
        $response->assertRedirect(route('admin.methods'));
    }

    public function test_admin_can_edit_method()
    {
        $user = factory(User::class)->create();
        $method = factory(Method::class)->create();

        $response = $this->actingAs($user)->post(route('method.update', 1), $method->toArray());
        $response->assertRedirect(route('admin.methods'));
    }

    public function test_admin_can_delete_method()
    {
        $user = factory(User::class)->create();
        $method = factory(Method::class)->create();

        $response = $this->actingAs($user)
            ->from(route('admin.methods'))
            ->delete(route('method.destroy', $method->id));

        $this->assertNull(Method::find($method->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('admin.methods'));
    }
}