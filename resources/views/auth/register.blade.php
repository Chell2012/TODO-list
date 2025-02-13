<x-guest-layout>
    <form class="input-group mb-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container">
            <div class="row">
                <!-- Name -->
                <div class="col-md-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="col-md-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>
            <div class="row">
                <!-- Password -->
                <div class="col-md-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="form-control"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="col-md-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="form-control"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <x-primary-button class="btn btn-secondary btn-lg active d-block ">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
