<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string','min:6'],
    ];

    // real time validation
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }



    public function login(){
        // $this->resetValidation();
      // $this->validate();

                if(Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)){
                    return redirect()->intended(RouteServiceProvider::HOME);

                }else{
                                     $this->addError('error', 'the credentials not correct');

                }


    }

    public function render()
    {
        return view('livewire.auth.login')
        ->layout('layouts.guest');
    }
}