<x-guest-layout>
    <style>
        body {
            background-color: #ffffff;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            background-color: #ffffff;
            backdrop-filter: blur(5px);
            border-radius: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .input-label {
            color: #333;
            font-weight: 600;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #9AE6B4;
            border-radius: 10px;
            margin-top: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .input-field:focus {
            border-color: #48BB78;
            outline: none;
            box-shadow: 0 0 10px rgba(72, 187, 120, 0.4);
        }

        .btn-green {
            background-color: #68D391;
            color: white;
            padding: 12px 20px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-green:hover {
            background-color: #48BB78;
        }

        .error-message {
            color: #E53E3E;
            margin-top: 4px;
            font-size: 14px;
        }

        .text-white {
            color: #ffffff;
        }

        .link {
            color: #3864f5;
            text-decoration: none;
            transition: color 0.3s;
        }

        .link:hover {
            color: #68D391;
        }
    </style>

    <form method="POST" action="{{ route('register') }}" class="form-container">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="input-label">Name</label>
            <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" required autofocus />
            <div class="error-message">{{ $errors->first('name') }}</div>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="input-label">Email</label>
            <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required />
            <div class="error-message">{{ $errors->first('email') }}</div>
        </div>
        
        <!-- Password -->
        <div>
            <label for="password" class="input-label">Password</label>
            <input id="password" class="input-field" type="password" name="password" required />
            <div class="error-message">{{ $errors->first('password') }}</div>
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="input-label">Confirm Password</label>
            <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required />
            <div class="error-message">{{ $errors->first('password_confirmation') }}</div>
        </div>

        <!-- Register Button -->
        <div class="flex justify-between items-center mt-6">
            <a class="link" href="{{ route('login') }}">Already registered?</a>
            <button type="submit" class="btn-green">Register</button>
        </div>
    </form>
</x-guest-layout>
