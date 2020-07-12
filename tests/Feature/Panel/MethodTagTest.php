<?php

namespace Tests\Feature\Panel;

use App\MethodTag;
use App\Type;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MethodTagTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_method_tag()
    {
        $user = factory(User::class)->create();
        $methodTag = factory(MethodTag::class)->make();

        $response = $this->actingAs($user)->post(route('methods.tags.store'), $methodTag->toArray());
        $response->assertRedirect(route('admin.methods.tags.index'));
    }

    public function test_admin_can_edit_method_tag()
    {
        $user = factory(User::class)->create();
        $methodTag = factory(MethodTag::class)->create();

        $response = $this->actingAs($user)->put(route('methods.tags.update', 1), $methodTag->toArray());
        $response->assertRedirect(route('admin.methods.tags.index'));
    }

    public function test_admin_can_delete_method_tag()
    {
        $user = factory(User::class)->create();
        $methodTag = factory(MethodTag::class)->create();

        $response = $this->actingAs($user)
            ->from(route('admin.methods.tags.index'))
            ->delete(route('methods.tags.destroy', $methodTag->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.methods.tags.index'));
    }
}
