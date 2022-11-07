@php
    $disabled = $errors->any() || empty($this->email) || empty($this->password) ? true : false;
@endphp
<x-auth-card class="">
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
         <!-- Session Status -->
         <x-auth-session-status class="mb-4" :status="session('status')" />
        <form class="my-4" wire:submit.prevent="login">
                <x-input-error :messages="$errors->get('error')" class="my-2 p-2 rounded text-gray-100 bg-danger " />

            <!-- Email Address -->
            <div>

                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border-gray-700"
                type="email"
                wire:model.defer="email"
                autofocus="off"  />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border-gray-700"
                type="password"
                wire:model.defer="password"
                autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded bg-gray-800 border-gray-300 text-gray-900 shadow-sm focus:border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember"
                        wire:model.defer="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-100"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button.primary class="ml-3" >
                    {{ __('Log in') }}
                </x-button.primary>
            </div>
        </form>
</x-auth-card>


