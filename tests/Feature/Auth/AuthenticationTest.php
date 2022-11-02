<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Auth\Login;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $component = Livewire::test(Login::class);

        $component->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        Livewire::actingAs($user);
        Livewire::test(Login::class)
        ->Set('email', $user->email)
        ->Set('password','password')
        ->call('login')
        ->assertHasNoErrors(['email','password']);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user);
        Livewire::test(Login::class)
        ->Set('email', $user->email)
        ->Set('password','pass') // min:6
        ->call('login')
        ->assertHasErrors(['password']);

       // $this->assertGuest();
    }
}