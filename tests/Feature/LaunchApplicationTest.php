<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LaunchApplicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function logged_in_users_can_launch_the_application()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    /** @test **/
    public function unverified_users_are_asked_to_verify_their_account()
    {
        $this->actingAs(factory(User::class)->create([
            'email_verified_at' => null,
        ]));

        $response = $this->get('/home');

        $response->assertRedirect('/email/verify');
    }

    /** @test **/
    public function guests_are_asked_to_log_in()
    {
        $response = $this->get('/home');

        $response->assertRedirect('/login');
    }
}
