<?php

namespace Tests\Feature\Panel;

use App\Type;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_type()
    {
        $user = factory(User::class)->create();
        $type = factory(Type::class)->make();

        $response = $this->actingAs($user)->post(route('type.store'), $type->toArray());
        $response->assertRedirect(route('admin.types'));
    }

    public function test_admin_can_edit_type()
    {
        $user = factory(User::class)->create();
        $type = factory(Type::class)->create();

        $response = $this->actingAs($user)->post(route('type.update', 1), $type->toArray());
        $response->assertRedirect(route('admin.types'));
    }

    public function test_admin_can_delete_type()
    {
        $user = factory(User::class)->create();
        $type = factory(Type::class)->create();

        $response = $this->actingAs($user)
            ->from(route('admin.types'))
            ->delete(route('type.destroy', $type->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.types'));
    }
}
