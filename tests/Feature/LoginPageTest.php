<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanLogingUsingTheLoginForm()
    {
        $user = User::factory()->create();

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/');

    }

    public function testUserCanNotAccessAdminPage()
    {
        $user = User::factory()->create();

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->get('/admin/users/');

        $response->assertRedirect('/');

    }

    public function testUserCanAccessAdminPage()
    {
        $user = User::factory()->create();

        $user->roles()->attach(1);

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response = $this->get('/admin/users/');

        $response->assertSeeText('Создать пользователя');

    }
}
