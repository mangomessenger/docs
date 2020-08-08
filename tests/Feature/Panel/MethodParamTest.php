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

    public function test_admin_can_create_method_param()
    {
        $user = factory(User::class)->create();
        $methodParam = factory(MethodParam::class)->make();

        $response = $this->actingAs($user)->post(route('methods.params.store', 1), $methodParam->toArray());
        $response->assertRedirect(route('methods.edit', 1));
    }

    public function test_admin_can_edit_method_param()
    {
        $user = factory(User::class)->create();
        $methodParam = factory(MethodParam::class)->create();

        $response = $this->actingAs($user)->put(route('methods.params.update', 1), $methodParam->toArray());
        $response->assertRedirect(route('methods.edit', 1));
    }

    public function test_admin_can_delete_method_param()
    {
        $user = factory(User::class)->create();
        $methodParam = factory(MethodParam::class)->create();

        $response = $this->actingAs($user)
            ->from(route('methods.edit', 1))
            ->delete(route('methods.params.destroy', $methodParam->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('methods.edit', 1));
    }

    public function test_admin_can_make_is_required_and_array_method_param()
    {
        $user = factory(User::class)->create();
        $methodParam = factory(MethodParam::class)->create();

        $response = $this->actingAs($user)
            ->from(route('methods.edit', $methodParam->id))
            ->put(route('methods.params.update', $methodParam->id), array_merge($methodParam->toArray(), [
                'required' => 1,
                'array' => 1,
        ]));

        $updatedMethodPram = MethodParam::find($methodParam->id);
        $this->assertEquals($updatedMethodPram->isRequired(), 'Yes');
        $this->assertEquals($updatedMethodPram->is_array, 1);
    }
}
