<x-guest-layout>
    <style>
        body {
            /* background-color: #f9f9f9; */
            background-image: url("{{ asset('images/bg-pattern.webp') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.95); 
            backdrop-filter: blur(10px); 
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); 
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease-in-out;
        }

        .input-label {
            color: #333333; 
        }

        .text-green-600 {
            color: #34D399; 
        }

        .border-green-400 {
            border-color: #34D399; 
        }

        .focus\:border-green-600:focus {
            border-color: #22C55E; 
        }

        .focus\:ring-green-300:focus {
            ring-color: #6EE7B7; 
        }

        .btn-green {
            background-color: #34D399; 
            color: white;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-green:hover {
            background-color: #22C55E; 
        }

        .error-message {
            color: #EF4444;
        }

        .btn-black {
            background-color: #111827;
            color: white;
        }

        .btn-black:hover {
            background-color: #1F2937;
        }

        .link {
            color: #4B5563;
            text-decoration: underline;
        }

        .link:hover {
            color: #6EE7B7;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form in a Floating Glass-Like Container -->
    <form method="POST" action="{{ route('login') }}" class="form-container shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-transform duration-300">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="input-label" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full border border-green-400 focus:border-green-600 focus:ring focus:ring-green-300 shadow-sm"
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error-message" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="input-label" />

            <x-text-input 
                id="password" 
                class="block mt-1 w-full border border-green-400 focus:border-green-600 focus:ring focus:ring-green-300" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 error-message" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded border-green-400 text-black shadow-sm focus:ring-green-500" 
                    name="remember" 
                />
                <span class="ms-2 text-sm text-black">{{ __('Remember me') }}</span>
            </label>
        </div>
        @if (Route::has('password.request'))
            <a 
                class="link mt-2 block" 
                href="{{ route('password.request') }}"
            >
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <div class="flex items-center justify-end mt-4">
            <a class="link" href="{{ route('register') }}">Sign Up?</a>
            <x-primary-button class="ms-3 btn-green">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
