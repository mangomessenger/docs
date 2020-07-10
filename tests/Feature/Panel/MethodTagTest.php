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

        $response = $this->actingAs($user)->post(route('method-tag.store'), $methodTag->toArray());
        $response->assertRedirect(route('admin.method-tags'));
    }

    public function test_admin_can_edit_method_tag()
    {
        $user = factory(User::class)->create();
        $methodTag = factory(MethodTag::class)->create();

        $response = $this->actingAs($user)->put(route('method-tag.update', 1), $methodTag->toArray());
        $response->assertRedirect(route('admin.method-tags'));
    }

    public function test_admin_can_delete_method_tag()
    {
        $user = factory(User::class)->create();
        $methodTag = factory(MethodTag::class)->create();

        $response = $this->actingAs($user)
            ->from(route('admin.method-tags'))
            ->delete(route('method-tag.destroy', $methodTag->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.method-tags'));
    }
}
