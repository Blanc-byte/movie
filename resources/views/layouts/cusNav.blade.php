<nav class="nav-container">
    <style>
        /* Top Navigation Bar Styles */
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Logo on the left */
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo img {
            max-width: 50px;
            height: auto;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Navigation links container */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Navigation links */
        .nav-link {
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            transition: background-color 0.3s, transform 0.2s ease-in-out;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .nav-link.active {
            background-color: white;
            color: #2575fc;
            font-weight: bold;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            animation: fadeIn 0.3s ease-in-out;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.2s;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .logout-form {
            display: inline;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Flex container for logo and title */
        .fd {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        /* Profile icon */
        .nav-link svg {
            width: 30px;
            height: 30px;
            fill: white;
            transition: transform 0.2s;
        }

        .nav-link svg:hover {
            transform: scale(1.2);
        }
    </style>

    <div class="fd">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('images/movies/logo.jpg') }}" alt="Logo">
            <span>BEC MOVIE</span>
        </a>
    </div>

    <!-- Navigation Menu -->
    <div class="nav-links">
        <a href="{{ route('movies') }}" class="nav-link {{ request()->routeIs('movies') ? 'active' : '' }}">
            {{ __('Movies') }}
        </a>
        
        <a href="{{ route('location') }}" class="nav-link {{ request()->routeIs('location') ? 'active' : '' }}">
            {{ __('Location') }}
        </a>

        <!-- Profile and Logout Dropdown -->
        <div class="dropdown">
            <a href="#" class="nav-link">
                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c3.866 0 7 3.134 7 7H5c0-3.866 3.134-7 7-7z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                </svg>
            </a>
            <div class="dropdown-content">
                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    {{ __('Profile') }}
                </a>
                <a href="{{ route('mypurchased') }}" class="{{ request()->routeIs('mypurchased') ? 'active' : '' }}">
                    {{ __('My Purchase') }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
