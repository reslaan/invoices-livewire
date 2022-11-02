<?php

namespace Tests\Feature\Auth;

use App\Http\Livewire\Auth\Register;
use Tests\TestCase;
use Livewire\Livewire;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $component = Livewire::test(Register::class);

        $component->assertStatus(200);
    }

    public function test_new_users_can_register()
    {

        Livewire::test(Register::class)
        ->Set('name', 'Test User')
        ->Set('email', 'test@example.com')
        ->Set('password','password')
        ->Set('password_confirmation','password')
        ->call('register')
        ->assertHasNoErrors();

    }
}