<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function registered_user_can_login()
    {

        $user = factory(User::class)->create([
            'username'    => 'adryan',
            'password' => bcrypt('1234'),
        ]);

        $this->visit('/login');

        $this->submitForm('Login', [
            'username'    => 'adryan',
            'password' => '1234',
        ]);

        $this->seePageIs('/home');

        $this->seeText('Dashboard');
    }
}