<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNews()
    {
        $response = $this->get('/news');
        $response->assertSee('About us');
    }

    public function testCreate()
    {
        $response = $this->get('/admim/create');
        $response->assertStatus(404);
        $response->assertDontSee('update');
    }
}
