<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test void
     */
    public function add_user()
    {
        $this->assertEquals(0, User::count());
        factory(User::class)->create();
        $this->assertEquals(1, User::count());
    }
}
