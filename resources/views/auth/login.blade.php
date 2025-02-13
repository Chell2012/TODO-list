<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="input-group mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container">
            <div class="row">
                <!-- Email Address -->
                <div class="col-md-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
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
                                  required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <!-- Remember Me -->
            <div class="col-md-4 mt-4">
                <label for="remember_me" class="form-check-label">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="btn btn-secondary btn-lg active d-block ">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <div class="col-md-4 mt-4">
                <a href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
