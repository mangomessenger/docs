<?php

namespace Tests\Feature\Panel;

use App\Type;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TypeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');
    }

    public function test_admin_can_create_type()
    {
        $user = factory(User::class)->create();
        $type = factory(Type::class)->make();

        $response = $this->actingAs($user)->post(route('types.store'), $type->toArray());
        $response->assertRedirect(route('admin.types.index'));
    }

    public function test_admin_can_edit_type()
    {
        $user = factory(User::class)->create();
        $type = factory(Type::class)->create();

        $response = $this->actingAs($user)->put(route('types.update', 1), $type->toArray());
        $response->assertRedirect(route('admin.types.index'));
    }

    public function test_admin_can_delete_type()
    {
        $user = factory(User::class)->create();
        $type = factory(Type::class)->create();

        $response = $this->actingAs($user)
            ->from(route('admin.types.index'))
            ->delete(route('types.destroy', $type->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.types.index'));
    }
}
