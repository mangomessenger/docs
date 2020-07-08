<?php

namespace Tests\Feature;

use App\Type;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_types_responses()
    {
        $user = factory(User::class)->create();

        $response = $this->get(route('admin.types'));
        $response->assertStatus(404);

        $response = $this->actingAs($user)->get(route('admin.types'));
        $response->assertStatus(200);
    }

    public function test_admin_types_create_responses()
    {
        $user = factory(User::class)->create();

        $response = $this->get(route('type.create'));
        $response->assertStatus(404);

        $response = $this->actingAs($user)->get(route('type.create'));
        $response->assertStatus(200);
    }
}
