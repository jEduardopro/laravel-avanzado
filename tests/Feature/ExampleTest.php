<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * A basic test example.
     *
     * @test
     */
    public function assert_true()
    {
        $this->assertTrue(true);
    }
}
