<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CorrectResponseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');
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
        $response = $this->get('/types/1');

        $response->assertStatus(200);
    }

    public function test_methods_page_returns_200()
    {
        $response = $this->get('/methods');

        $response->assertStatus(200);
    }

    public function test_method_page_returns_200()
    {
        $response = $this->get('/methods/get/1');

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
