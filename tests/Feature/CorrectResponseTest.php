<?php

namespace Tests\Feature;

use App\Method;
use App\MethodTag;
use App\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CorrectResponseTest extends TestCase
{
    use RefreshDatabase;

    private Method $method;
    private Type $type;

    public function setUp(): void
    {
        parent::setUp();

        $this->type = factory(Type::class)->create();
        factory(MethodTag::class)->create();
        $this->method = factory(Method::class)->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_main_page_returns_200()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_page_returns_200()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }

    public function test_types_page_returns_200()
    {
        $response = $this->get('/types');

        $response->assertStatus(200);
    }

    public function test_type_page_returns_200()
    {
        $response = $this->get("/types/{$this->type->id}");

        $response->assertStatus(200);
    }

    public function test_methods_page_returns_200()
    {
        $response = $this->get('/methods');

        $response->assertStatus(200);
    }

    public function test_method_page_returns_200()
    {
        $response = $this->get("/methods/{$this->method->type}/{$this->method->id}");

        $response->assertStatus(200);

        $response = $this->get("/methods/{$this->method->type}/{$this->method->formatName()}");

        $response->assertStatus(200);
    }

    public function test_login_page_returns_200()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_panel_forbidden()
    {
        $response = $this->get('/panel');

        $response->assertStatus(404);
    }
}
