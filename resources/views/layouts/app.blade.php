<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        
    </head>
    <body class="font-sans antialiased">
        <div>
            <!-- Sidebar Navigation -->
            <div class="sidebar">
                @if(Auth::user()->role === 'admin')
                <style>
                    /* Sidebar styles */
                    .sidebar {
                        position: fixed;
                        top: 0;
                        left: 0;
                        height: 100vh;
                        width: 200px;
                        background-color: white;
                        border-right: 1px solid #e2e8f0;
                        padding: 16px;
                        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
                    }
                    .content {
                        margin-left: 200px;
                        /* margin-top: 200px; */
                        min-height: 100vh;
                        background-color: #ffffff;
                        /* background-image: url("{{ asset('images/pets.jpg') }}");   */
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                    }
        
                </style>
                    @include('layouts.navigation')
                @elseif(Auth::user()->role === 'customer')
                <style>
                    /* Sidebar styles */
                    /* .sidebar {
                        position: fixed;
                        top: 0;
                        left: 0;
                        height: 100vh;
                        width: 200px;
                        background-color: white;
                        border-right: 1px solid #e2e8f0;
                        padding: 16px;
                        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
                    } */
                    .content {
                        /* margin-left: 200px; */
                        margin-top: 80px;
                        /* min-height: 100vh; */
                        background-color: #585858;
                        /* background-image: url("{{ asset('images/pets.jpg') }}");   */
                        /* background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat; */
                    }
        
                </style>
                    @include('layouts.cusNav')
                @endif
            </div>
            <div class="content bg-gray-100 ">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
